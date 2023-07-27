<script setup>
  import {reactive, ref, h} from "vue";
  import {mdiBallotOutline, mdiAccount, mdiMail, mdiGithub, mdiDelete, mdiEye} from "@mdi/js";
  import SectionMain from "@/components/SectionMain.vue";
  import CardBox from "@/components/CardBox.vue";
  import FormCheckRadioGroup from "@/components/FormCheckRadioGroup.vue";
  import FormFilePicker from "@/components/FormFilePicker.vue";
  import FormField from "@/components/FormField.vue";
  import FormControl from "@/components/FormControl.vue";
  import BaseDivider from "@/components/BaseDivider.vue";
  import BaseButton from "@/components/BaseButton.vue";
  import BaseButtons from "@/components/BaseButtons.vue";
  import SectionTitle from "@/components/SectionTitle.vue";
  import LayoutAuthenticated from "@/layouts/LayoutAuthenticated.vue";
  import SectionTitleLineWithButton from "@/components/SectionTitleLineWithButton.vue";
  import NotificationBarInCard from "@/components/NotificationBarInCard.vue";
  import {Modal, DataTable} from "@/components";
  import {DeleteOutlined} from '@ant-design/icons-vue';

  import {PlusOutlined, LoadingOutlined} from '@ant-design/icons-vue';

  import Api from "@/utils/Api";
  import router from "@/router";
  import FormDetail from "./FormDetail.vue";

  const isShowModal = ref(false)

  const editProduct = ref(null);

  function showEditUser(user, reload) {
    isShowModal.value = true;
    editProduct.value = user;
  }

  const tableConfig = {
    api: (params) => Api.get('product/list', {params}),
    addAction: (reload) => {
      //showEditUser({}, reload)
      router.push('/products/0')
    },
    itemActions: [
      {
        label: 'Edit'
        , key: 'edit'
        , class: 'font-medium text-blue-600 dark:text-blue-500 hover:underline'
        , action(item, reload) {
          router.push('/products/' + item.id)
        }
      },
      {
        label: ''
        , class: 'font-medium text-red-600 dark:text-red-500 hover:underline'
        , icon: mdiDelete
        , key: 'delete'
        , action(item, reload) {
          Api.delete('user/' + item.id).then(reload)
        }
      }

    ],
    columns: [
      {
        title: 'Hình ảnh',
        key: 'image'
      },
      {
        title: 'Loại sản phẩm',
        key: 'type'
      },
      {
        title: 'Tên sản phẩm',
        key: 'name'
      },
      {
        title: 'Giá niêm yết',
        key: 'price'
      },
      {
        title: 'Giá sản phẩm',
        key: 'price'
      },
      {
        title: 'Điểm thưởng(Point)',
        key: 'point'
      },
      {
        title: 'Status',
        key: 'status'
      }
    ],
    selectionActions: [
      {
        title: 'Active',
        action(selectedKeys) {
          return Api.post('user/activeList', selectedKeys)
        }, complete() {
          alert('success')
        }
      }
      , {
        title: 'DeActive', action(selectedKeys) {
          return Api.post('user/activeList', selectedKeys)
        }, complete() {
          alert('success')
        }
      }
      , {
        title: 'Delete',
        action(selectedKeys) {
          return Api.post('user/deleteList', selectedKeys)
        },
        complete() {
          alert('success')
        }
      }
    ]
  }

</script>

<template>
  <LayoutAuthenticated>
    <SectionMain>
      <SectionTitleLineWithButton
        :icon="mdiBallotOutline"
        title="Quản lý sản phẩm"
        main
      >

      </SectionTitleLineWithButton>
      <DataTable v-bind="tableConfig">
        <template #cellAction[delete]="{item,actionMethod}">
          <a-popconfirm
            title="Are you sure delete this user?"
            ok-text="Yes"
            cancel-text="No"
            @confirm="actionMethod"
          >
            <a-button
              type="text"
              v-if="item.role !== 'admin'"
              danger
              :icon="h(DeleteOutlined)"
              label=""
              :outline="true"
            >
            </a-button>
          </a-popconfirm>
        </template>
        <template #cell[image]="{item,column}">
          <img class="w-10 h-10 float-left rounded-full" :src="item.image_url"
               :alt="item.name"/>
        </template>
        <template #cell[type]="{item,column}">
          {{item.type == 'product' ? 'Sản phẩm' : 'Gói sản phẩm'}}
        </template>
        <template #cell[name]="{item,column}">
          {{item.name}}
        </template>
        <template #cell[price]="{item,column}">
          {{item.price}}
        </template>
        <template #cell[sale_price]="{item,column}">
          {{item.sale_price}}
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

  <FormDetail :value="editProduct" :isShowModal="isShowModal"></FormDetail>


</template>
