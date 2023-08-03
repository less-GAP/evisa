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

import Api from "@/utils/Api";
import router from "@/router";
import FormUser from "./FormUser.vue";


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
  api: (params) => Api.get('user/list', {params}),
  addAction: (reload) => {
    showEditUser(null, reload)
  },
  itemActions: [
    // {
    //   label: 'View'
    //   , key: 'view'
    //   , icon: mdiEye
    //   , class: 'font-medium text-blue-600 dark:text-blue-500 hover:underline'
    //   , action(item, reload) {
    //     router.push('/users/' + item.id)
    //   }
    // },
    {
      label: 'Edit User'
      , key: 'edit'
      , class: 'font-medium text-blue-600 dark:text-blue-500 hover:underline'
      , action(item, reload) {
        showEditUser(item, reload)
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
    {title: 'Username', key: 'username'}
   , {title: 'Name', key: 'full_name'}
    , {title: 'Role', key: 'role'}
    , {title: 'Status', key: 'status'}
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
      <template #cell[full_name]="{item,column}">
        <img class="w-10 h-10 float-left rounded-full" :src="item.profile_photo_url"
             :alt="item.full_name">
        <div class="pl-3 float-left">
          <div class="text-base font-semibold">{{ item.full_name }}</div>
          <div class="font-normal text-gray-500">{{ item.email }}</div>
        </div>
      </template>
      <template #cell[status]>
        <div class="flex items-center">
          <div class="h-2.5 w-2.5 rounded-full bg-red-500 mr-2"></div>
          Offline
        </div>
      </template>
    </DataTable>

  </LayoutAuthenticated>
  <a-modal :title="modalState.value?.id?'Edit User':'Add User'" :footer="null" width="800px" v-model:open="modalState.visible">
    <FormUser  v-if="modalState.visible"
              @success="modalState.visible=false;modalState.success()" @cancel="modalState.visible=false"
              :value="modalState.value"></FormUser>
  </a-modal>
</template>
