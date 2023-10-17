<script setup>
import { reactive, ref, h } from "vue";
import { mdiBallotOutline, mdiDelete, mdiEye } from "@mdi/js";
import SectionMain from "@/components/SectionMain.vue";
import LayoutAuthenticated from "@/layouts/LayoutAuthenticated.vue";
import { Modal, DataTable } from "@/components";

import { PlusOutlined, LoadingOutlined, DeleteOutlined, FormOutlined } from '@ant-design/icons-vue';

import { InputUpload } from "@/components";

import Api from "@/utils/Api";
import router from "@/router";

import { notification } from "ant-design-vue";
import { useAuthStore } from "@/stores/auth";
const auth = useAuthStore();

const isShowModal = ref(false)
const editProduct = ref(null);
const routePath = '/sms'
function showEditUser(user, reload) {
  isShowModal.value = true;
  editProduct.value = user;
}
const listActions = [
  {
    label: 'Add',
    action: (reload) => {
      //showEditUser({}, reload)
      router.replace(routePath + '/new')
    }
  }
]
const tableConfig = {
  tableConfig: {
    sticky: true,
    scroll: "{ x: 1500, y: 300 }",
    bordered: true,
    showHeader: true
  },
  api: (params) => Api.get('sms/list', { params }),
  addAction: {
    action: (reload) => {
      //showEditUser({}, reload)
      router.push('/sms/0')
    },
    ifShow: auth.hasPermission('SMS.create')
  },
  listActions,
  columns: [
    {
      title: 'Phone',
      key: 'phone'
    },
    {
      title: 'Content',
      key: 'content',
    },
    {
      title: 'Created At',
      key: 'created_at'
    },
    {
      title: 'Created By',
      key: 'created_by'
    },
    {
      title: 'Status',
      key: 'status'
    },
  ],
  selectionActions: [
    // {
    //   title: 'Active',
    //   action(selectedKeys) {
    //     return Api.post('sms/activeList', {
    //       'items': selectedKeys,
    //       'status': 'A'
    //     }).then(rs => {
    //       notification[rs.data.code == 0 ? 'error' : 'success']({
    //         message: 'Notification',
    //         description: rs.data.message,
    //       });
    //     })
    //   },
    //   // complete() {
    //   //   alert('success')
    //   // }
    // },
    // {
    //   title: 'Deactive',
    //   action(selectedKeys) {
    //     return Api.post('sms/activeList', {
    //       'items': selectedKeys,
    //       'status': 'D'
    //     }).then(rs => {
    //       notification[rs.data.code == 0 ? 'error' : 'success']({
    //         message: 'Notification',
    //         description: rs.data.message,
    //       });
    //     })
    //   },
    //   // complete() {
    //   //   alert('success')
    //   // }
    // },
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
        <template #cellAction[edit]="{ item, actionMethod }">
          <a-button type="text" :icon="h(FormOutlined)" label="" :outline="true" @click="actionMethod">
          </a-button>
        </template>
        <template #cell[created_at]="{ item, column }">
          {{ $format.formatDateTime(item.created_at) }}
        </template>
        <template #cell[status]="{ item, column }">
          <div class="flex items-center" v-if="item.status != 'queued'">
            <div class="h-2.5 w-2.5 rounded-full bg-red-500 mr-2"></div>
            Not Sent
          </div>
          <div class="flex items-center" v-else>
            <div class="h-2.5 w-2.5 rounded-full bg-green-500 mr-2"></div>
            Sent
          </div>
        </template>
      </DataTable>
    </SectionMain>
  </LayoutAuthenticated>
</template>
