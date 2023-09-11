<script setup>
  import {reactive, ref, h} from "vue";
  import {mdiBallotOutline, mdiAccount, mdiMail, mdiGithub, mdiDelete, mdiEye} from "@mdi/js";
  import SectionMain from "@/components/SectionMain.vue";
  import LayoutAuthenticated from "@/layouts/LayoutAuthenticated.vue";

  import {Modal, DataTable} from "@/components";
  import {DeleteOutlined, FormOutlined} from '@ant-design/icons-vue';

  import Api from "@/utils/Api";
  import router from "@/router";
  import {notification} from "ant-design-vue";


  const tableConfig = {
    api: (params) => Api.get('payment-method/list', {params}),
    addAction: (reload) => {
      router.replace('/payment-method/0')
    },
    itemActions: [
      {
        label: '',
        class: 'font-medium text-blue-600 dark:text-blue-500 hover:underline',
        icon: mdiDelete,
        key: 'edit',
        action(item, reload) {
          router.replace('/payment-method/' + item.id)
        }
      },
      {
        label: '',
        class: 'font-medium text-red-600 dark:text-red-500 hover:underline',
        icon: mdiDelete,
        key: 'delete',
        action(item, reload) {
          Api.delete('payment-method/' + item.id).then(rs => {
            notification[rs.data.code == 0 ? 'error' : 'success']({
              message: 'Thông báo',
              description: rs.data.message,
            });
          }).finally(() => {
            reload();
          });
        }
      }

    ],
    columns: [
      {title: 'Hình đại diện', key: 'image'},
      {title: 'Mã phương thức', key: 'code'},
      {title: 'Tên phương thức', key: 'name'},
      {title: 'Mô tả ngắn', key: 'short_description'},
      {title: 'Tình trạng', key: 'status'}
    ],
    selectionActions: [
      {
        title: 'Hoạt động',
        action(selectedKeys) {
          return Api.post('payment-method/activeList', {
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
          return Api.post('payment-method/activeList', {
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
        <template #cellAction[delete]="{item,actionMethod}">
          <a-popconfirm
            title="Bạn muốn xóa phương thức thanh toán này?"
            ok-text="Yes"
            cancel-text="No"
            @confirm="actionMethod"
          >
            <a-button
              type="text"
              danger
              :icon="h(DeleteOutlined)"
              label=""
              :outline="true"
            >
            </a-button>
          </a-popconfirm>
        </template>
        <template #cellAction[edit]="{item,actionMethod}">
          <a-button
            type="text"
            :icon="h(FormOutlined)"
            label=""
            :outline="true"
            @click="actionMethod"
          >
          </a-button>
        </template>
        <template #cell[image]="{item,column}">
          <img class="w-20 h-auto float-left rounded-full" :src="item.image_url"
               :alt="item.name"/>
        </template>
        <template #cell[name]="{item,column}">
          {{item.name}}
        </template>
        <template #cell[status]="{item,column}">
          <div class="flex items-center" v-if="item.status == 'D'">
            <div class="h-2.5 w-2.5 rounded-full bg-red-500 mr-2"></div>
            Tắt
          </div>
          <div class="flex items-center" v-else>
            <div class="h-2.5 w-2.5 rounded-full bg-green-500 mr-2"></div>
            Hoạt động
          </div>
        </template>
      </DataTable>
    </SectionMain>
  </LayoutAuthenticated>
  <a-modal :open="previewVisible" :title="previewTitle" :footer="null" @cancel="handleCancel">
    <video controls>
      <source :src="previewUrl">
    </video>
  </a-modal>
</template>
