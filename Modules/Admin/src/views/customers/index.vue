<script setup>
  import {reactive, ref, h} from "vue";
  import {mdiBallotOutline, mdiAccount, mdiMail, mdiGithub, mdiDelete, mdiEye} from "@mdi/js";
  import SectionMain from "@/components/SectionMain.vue";
  import LayoutAuthenticated from "@/layouts/LayoutAuthenticated.vue";
  import SectionTitleLineWithButton from "@/components/SectionTitleLineWithButton.vue";
  import NotificationBarInCard from "@/components/NotificationBarInCard.vue";
  import {Modal, DataTable} from "@/components";
  import {DeleteOutlined} from '@ant-design/icons-vue';

  import Api from "@/utils/Api";
  import router from "@/router";
  import FormUser from "./FormUser.vue";
  import {notification} from "ant-design-vue";


  const modalState = ref({
    visible: false,
    value: null,
    success: () => {
    },
    cancel: () => {
    },
  });

  function showEditUser(value, success) {
    modalState.value.visible = true;
    modalState.value.value = value;
    modalState.value.success = success;
  }

  const tableConfig = {
    api: (params) => Api.get('customer/list', {params}),
    // addAction: (reload) => {
    //   showEditUser(null, reload)
    // },
    itemActions: [],
    columns: [
      {title: 'Nhóm khách hàng', key: 'customer_group_name'},
      {title: 'Tên đăng nhập', key: 'username'},
      {title: 'Tên', key: 'name'},
      {title: 'Email', key: 'email'},
      {title: 'Điện thoại', key: 'phone'},
      {title: 'Ngày xác nhận', key: 'email_verified_at'},
      {title: 'Mã giới thiệu', key: 'referral_code'},
      {title: 'Tình trạng', key: 'status'}
    ],
    selectionActions: [
      {
        title: 'Hoạt động',
        action(selectedKeys) {
          return Api.post('customer/activeList', {
            'items': selectedKeys,
            'status': 'A'
          }).then(rs => {
            notification[rs.data.code == 0 ? 'error' : 'success']({
              message: 'Thông báo',
              description: rs.data.message,
            });
          })
        },
      },
      {
        title: 'Tắt',
        action(selectedKeys) {
          return Api.post('customer/activeList', {
            'items': selectedKeys,
            'status': 'D'
          }).then(rs => {
            notification[rs.data.code == 0 ? 'error' : 'success']({
              message: 'Thông báo',
              description: rs.data.message,
            });
          })
        },
      },
    ]
  }
</script>

<template>
  <LayoutAuthenticated>
    <SectionMain>
      <DataTable v-bind="tableConfig">
        <template #cell[full_name]="{item,column}">
          <img class="w-10 h-10 float-left rounded-full" :src="item.profile_photo_url"
               :alt="item.full_name">
          <div class="pl-3 float-left">
            <div class="text-base font-semibold">{{ item.full_name }}</div>
            <div class="font-normal text-gray-500">{{ item.email }}</div>
          </div>
        </template>
        <template #cell[status]="{item,column}">
          <div class="flex items-center" v-if="item.status == 'D'">
            <div class="h-2.5 w-2.5 rounded-full bg-red-500 mr-2"></div>
            Tắt
          </div>
          <div class="flex items-center" v-if="item.status == 'A'">
            <div class="h-2.5 w-2.5 rounded-full bg-green-500 mr-2"></div>
            Hoạt động
          </div>
        </template>
      </DataTable>
    </SectionMain>

  </LayoutAuthenticated>
  <a-modal :footer="null" width="800px" v-model:open="modalState.visible">
    <FormUser v-if="modalState.visible" @success="isShowModal=false;modalState.reload()" @cancel="modalState.visible=false"
              :value="modalState.value"></FormUser>
  </a-modal>
</template>
