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
import {Modal, DataTable, FileManager} from "@/components";
import {DeleteOutlined} from '@ant-design/icons-vue';
import { InboxOutlined } from '@ant-design/icons-vue';
import { message } from 'ant-design-vue';

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
    //     router.replace('/users/' + item.id)
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
const fileList = ref([]);
const handleChange = (info) => {
  const status = info.file.status;
  if (status !== 'uploading') {
    console.log(info.file, info.fileList);
  }
  if (status === 'done') {
    message.success(`${info.file.name} file uploaded successfully.`);
  } else if (status === 'error') {
    message.error(`${info.file.name} file upload failed.`);
  }
};
function handleDrop(e) {
  console.log(e);
}
</script>

<template>
  <LayoutAuthenticated>
    <FileManager></FileManager>

  </LayoutAuthenticated>

</template>
