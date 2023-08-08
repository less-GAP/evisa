<script setup>
  import {reactive, ref, h} from "vue";
  import {mdiBallotOutline, mdiDelete} from "@mdi/js";
  import SectionMain from "@/components/SectionMain.vue";
  import LayoutAuthenticated from "@/layouts/LayoutAuthenticated.vue";
  import SectionTitleLineWithButton from "@/components/SectionTitleLineWithButton.vue";
  import {Modal, DataTable} from "@/components";

  import {PlusOutlined, LoadingOutlined, DeleteOutlined, FormOutlined} from '@ant-design/icons-vue';

  import {InputUpload} from "@/components";

  import Api from "@/utils/Api";
  import router from "@/router";

  import {notification} from "ant-design-vue";

  const isShowModal = ref(false)

  const editProduct = ref(null);

  function showEditUser(user, reload) {
    isShowModal.value = true;
    editProduct.value = user;
  }

  const tableConfig = {
    tableConfig: {
      sticky: true,
      scroll: "{ x: 1500, y: 300 }",
      bordered: true,
      showHeader: true
    },
    api: (params) => Api.get('package/list', {params}),
    addAction: (reload) => {
      //showEditUser({}, reload)
      router.push('/packages/0')
    },
    itemActions: [
      {
        label: '',
        class: 'font-medium text-blue-600 dark:text-blue-500 hover:underline',
        icon: mdiDelete,
        key: 'edit',
        action(item, reload) {
          router.push('/packages/' + item.id)
        }
      },
      {
        label: '',
        class: 'font-medium text-red-600 dark:text-red-500 hover:underline',
        icon: mdiDelete,
        key: 'delete',
        action(item, reload) {
          Api.delete('package/' + item.id).then(rs => {
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
      {
        title: 'Hình ảnh',
        key: 'image',
      },
      {
        title: 'Tên gói sản phẩm',
        key: 'name'
      },
      {
        title: 'Lộ trình',
        key: 'package',
        align: 'left',
      },
      {
        title: 'Tình trạng',
        key: 'status'
      },
    ],
    selectionActions: [
      {
        title: 'Hoạt động',
        action(selectedKeys) {
          return Api.post('package/activeList', {
            'items': selectedKeys,
            'status': 'A'
          }).then(rs => {
            notification[rs.data.code == 0 ? 'error' : 'success']({
              message: 'Thông báo',
              description: rs.data.message,
            });
          })
        },
        // complete() {
        //   alert('success')
        // }
      },
      {
        title: 'Tắt',
        action(selectedKeys) {
          return Api.post('package/activeList', {
            'items': selectedKeys,
            'status': 'D'
          }).then(rs => {
            notification[rs.data.code == 0 ? 'error' : 'success']({
              message: 'Thông báo',
              description: rs.data.message,
            });
          })
        },
        // complete() {
        //   alert('success')
        // }
      },
      // {
      //   title: 'Delete',
      //   action(selectedKeys) {
      //     return Api.post('user/deleteList', selectedKeys)
      //   },
      //   complete() {
      //     alert('success')
      //   }
      // }
    ]
  }

</script>

<template>
  <LayoutAuthenticated>
    <SectionMain>
      <DataTable v-bind="tableConfig">
        <template #cellAction[delete]="{item,actionMethod}">
          <a-popconfirm
            title="Bạn muốn xóa sản phẩm này?"
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
        <template #cell[package]="{item,column}">
          <div v-for="(value, index) in item.packages" :key="index">
            <b>{{value.name}} - {{value.time}}</b>:  {{$format.formatMoney(value.price)}}
          </div>
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

</template>
