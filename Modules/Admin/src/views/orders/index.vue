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
    tableConfig: {
      sticky: true,
      scroll: "{ x: 1500, y: 300 }",
      bordered: true,
      showHeader: true
    },
    api: (params) => Api.get('orders/list', {params}),
    addAction: (reload) => {
      router.replace('/orders/0')
    },
    itemActions: [
      {
        label: '',
        class: 'font-medium text-blue-600 dark:text-blue-500 hover:underline',
        icon: mdiDelete,
        key: 'edit',
        action(item, reload) {
          router.replace('/orders/' + item.id)
        }
      },
    ],
    columns: [
      {
        title: 'Mã đơn hàng',
        key: 'id',
        dataIndex: 'id',
        fixed: 'left',
        width: '120px'
      },
      {
        title: 'Khách hàng',
        key: 'customer_name',
        dataIndex: 'customer_name',
        fixed: 'left',
        width: '200px'
      },
      {
        title: 'Điện thoại',
        key: 'customer_phone',
        dataIndex: 'customer_phone',
        width: '160px'
      },
      {
        title: 'Vận chuyển',
        key: 'shipping',
        dataIndex: 'shipping',
        width: '250px'
      },
      {
        title: 'Thanh toán',
        key: 'payment',
        dataIndex: 'payment',
        width: '250px'
      },
      {
        title: 'Thành tiền',
        key: 'subtotal',
        dataIndex: 'subtotal',
        width: '150px',
        align: 'right'
      },
      {
        title: 'Phí vận chuyển',
        key: 'shipping_cost',
        dataIndex: 'shipping_cost',
        width: '150px',
        align: 'right'
      },
      {
        title: 'Giảm giá',
        key: 'discount',
        dataIndex: 'discount',
        width: '150px',
        align: 'right'
      },
      {
        title: 'Tổng tiền',
        key: 'total',
        dataIndex: 'total',
        width: '150px',
        align: 'right',
        fixed: 'left',
      },
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
