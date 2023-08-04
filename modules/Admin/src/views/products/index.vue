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

  import FormDetail from "./FormDetail.vue";

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
    api: (params) => Api.get('product/list', {params}),
    addAction: (reload) => {
      //showEditUser({}, reload)
      router.push('/products/0')
    },
    itemActions: [
      {
        label: '',
        class: 'font-medium text-blue-600 dark:text-blue-500 hover:underline',
        icon: mdiDelete,
        key: 'edit',
        action(item, reload) {
          router.push('/products/' + item.id)
        }
      },
      {
        label: '',
        class: 'font-medium text-red-600 dark:text-red-500 hover:underline',
        icon: mdiDelete,
        key: 'delete',
        action(item, reload) {
          Api.delete('product/' + item.id).then(rs => {
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
        title: 'Loại sản phẩm',
        key: 'type'
      },
      {
        title: 'Tên sản phẩm',
        key: 'name'
      },
      {
        title: 'Giá niêm yết',
        key: 'price',
        align: 'right',
      },
      {
        title: 'Giá sản phẩm',
        key: 'price',
        align: 'right',
      },
      {
        title: 'Điểm thưởng(Point)',
        key: 'point',
        align: 'right',
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
          return Api.post('product/activeList', {
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
          return Api.post('product/activeList', {
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
        <template #cell[type]="{item,column}">
          {{item.type == 'product' ? 'Sản phẩm' : 'Gói sản phẩm'}}
        </template>
        <template #cell[name]="{item,column}">
          {{item.name}}
        </template>
        <template #cell[price]="{item,column}">
          {{$format.formatMoney(item.price)}}
        </template>
        <template #cell[sale_price]="{item,column}">
          {{$format.formatMoney(item.sale_price)}}
        </template>
        <template #cell[point]="{item,column}">
          {{$format.formatNumber(item.point)}}
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
