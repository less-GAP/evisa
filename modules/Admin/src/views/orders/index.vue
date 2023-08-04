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
    api: (params) => Api.get('orders/list', {params}),
    addAction: (reload) => {
      router.push('/orders/0')
    },
    itemActions: [
      {
        label: '',
        class: 'font-medium text-blue-600 dark:text-blue-500 hover:underline',
        icon: mdiDelete,
        key: 'edit',
        action(item, reload) {
          router.push('/orders/' + item.id)
        }
      },
    ],
    columns: [
      {title: 'Mã đơn hàng', key: 'id'},
      {title: 'Khách hàng', key: 'customer_name'},
      {title: 'Điện thoại', key: 'customer_phone'},
      {title: 'Vận chuyển', key: 'shipping'},
      {title: 'Thanh toán', key: 'payment'},
      {title: 'Thành tiền', key: 'subtotal'},
      {title: 'Phí vận chuyển', key: 'shipping_cost'},
      {title: 'Giảm giá', key: 'discount'},
      {title: 'Tổng tiền', key: 'total'},
    ],
    selectionActions: [
      {
        title: 'Hoạt động',
        action(selectedKeys) {
          return Api.post('orders/activeList', {
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
          return Api.post('orders/activeList', {
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
        <template #cell[id]="{item,column}">
          #{{item.id}}
        </template>
        <template #cell[shipping]="{item,column}">
          {{item.shipping_name}}
        </template>
        <template #cell[payment]="{item,column}">
          {{item.payment_name}}
        </template>
        <template #cell[subtotal]="{item,column}">
          {{$format.formatMoney(item.subtotal)}}
        </template>
        <template #cell[shipping_cost]="{item,column}">
          {{$format.formatMoney(item.shipping_cost)}}
        </template>
        <template #cell[discount]="{item,column}">
          {{$format.formatMoney(item.discount)}}
        </template>
        <template #cell[total]="{item,column}">
          {{$format.formatMoney(item.total)}}
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
