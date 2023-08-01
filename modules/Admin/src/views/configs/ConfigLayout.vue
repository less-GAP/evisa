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
import {AppstoreOutlined, DeleteOutlined, MailOutlined} from '@ant-design/icons-vue';

import Api from "@/utils/Api";
import router from "@/router";
import FormUser from "./FormUser.vue";
import {MenuProps} from "ant-design-vue/lib/menu";


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
const items = ref([
  {
    key: 'General',
    icon: () => h(MailOutlined),
    label: 'General',
    href:'/config/general',
    title: 'General',
  },
  {
    key: 'shop_config',
    icon: () => h(AppstoreOutlined),

    label: 'Shop config',
    title: 'Shop config',
  },
  {
    key: 'payment_method',
    icon: () => h(AppstoreOutlined),

    label: 'Payment method',
    title: 'Payment method',
  },
  {
    key: 'referral_config',
    icon: () => h(AppstoreOutlined),

    label: 'Referral config',
    title: 'Referral config',
  },
  {
    key: 'smtp',
    icon: () => h(AppstoreOutlined),
    label: 'SMTP',
    title: 'SMTP',
  },
  {
    key: 'invoice_template',
    icon: () => h(MailOutlined),
    label: 'Invoice Templates',
    title: 'Invoice Templates',
  },{
    key: 'mail_template',
    icon: () => h(MailOutlined),
    label: 'Email Templates',
    title: 'Email Templates',
  },

]);
</script>

<template>
  <LayoutAuthenticated>
    <a-layout>
      <a-layout-sider  style="width:300px;background: #fff;max-width:40vw;">
        <a-menu  mode="vertical" :items="items">
          <template #label>3242342</template>
        </a-menu>
      </a-layout-sider>
      <a-layout-content
        :style="{ background: '#fff', padding: '24px', margin: 0, minHeight: '280px' }"
      >
        <router-view />
      </a-layout-content>
    </a-layout>
  </LayoutAuthenticated>

</template>
