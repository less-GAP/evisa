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
  api: (params) => Api.get('sms/list', { params }),
  addAction: {
    action: (reload) => {
      //showEditUser({}, reload)
      router.push('/sms/0')
    },
    ifShow: auth.hasPermission('SMS.create')
  },
  itemActions: [
    {
      label: 'View',
      class: 'font-medium text-blue-600 dark:text-blue-500 hover:underline',
      icon: mdiEye,
      key: 'view',
      action(item, reload) {
        window.open(
          item.preview_url,
          '_blank'
        );
      }
    },
    {
      ifShow: auth.hasPermission('SMS.update'),
      label: '',
      class: 'font-medium text-blue-600 dark:text-blue-500 hover:underline',
      icon: mdiDelete,
      key: 'edit',
      action(item, reload) {
        router.push('/sms/' + item.id)
      }
    },
    {
      ifShow: auth.hasPermission('SMS.delete'),
      label: '',
      class: 'font-medium text-red-600 dark:text-red-500 hover:underline',
      icon: mdiDelete,
      key: 'delete',
      action(item, reload) {
        Api.delete('sms/' + item.id).then(rs => {
          notification[rs.data.code == 0 ? 'error' : 'success']({
            message: 'Notification',
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
