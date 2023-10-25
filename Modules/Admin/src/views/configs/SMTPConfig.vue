<script setup>
import { reactive, ref } from "vue";
import { message } from 'ant-design-vue';

import Api from "@/utils/Api";
import validateMessages from "@/utils/validateMessages";
import { InputUpload } from "@/components";

const configNames = [
  'smtp_server',
  'smtp_port',
  'smtp_security',
  'smtp_user',
  'smtp_password',
  'smtp_email_from',
]

const emit = defineEmits(["success", "cancel"]);
const loading = ref(false)
const error = ref(null)
const openTest = ref(false)
const formState = reactive({});
const formTest = reactive({
  'email_to': ''
});
const formConfig = reactive({
  "validateTrigger": "submit",
  "label-align": "top",
  "model": formState,
  labelCol: { span: 8 },
  wrapperCol: { span: 16 },
  "validate-messages": validateMessages,
});
const fetch = function () {
  loading.value = true
  Api.get('config', { params: { names: configNames } }).then(result => {
    Object.assign(formState, result.data)
  }).catch(e => {
  }).finally(loading.value = false)
}
fetch();
const submit = async function () {
  loading.value = true
  Api.post('config', formState).then(result => {
    emit('success', result)
  }).catch(e => {
  }).finally(loading.value = false)
}
const sendTest = async function () {
  Api.post('config/testSmtp', { ...formState, ...formTest }).then(result => {
    openTest.value = false
  }).catch(e => {
  }).finally(loading.value = false)
}

const cancel = function () {
  emit('cancel')
}


</script>

<template>
  <h3 class="font-bold">SMTP Config</h3>
  <hr class="mb-6 mt-4" />
  <a-form style="max-width: 600px" autocomplete="off" :model="formState" v-bind="formConfig" @finish="submit">
    <a-form-item name="smtp_server" label="SMTP Server" :rules="[{ required: true }]">
      <a-input placeholder="domain.com" autocomplete="off" v-model:value="formState.smtp_server" />
    </a-form-item>
    <a-form-item name="smtp_port" label="SMTP Port" :rules="[{ required: true }]">
      <a-input placeholder="25" autocomplete="off" v-model:value="formState.smtp_port" />
    </a-form-item>
    <a-form-item name="smtp_security" label="Security" :rules="[{ required: true }]">
      <a-input placeholder="tls" autocomplete="off" v-model:value="formState.smtp_security" />
    </a-form-item>

    <a-form-item name="smtp_user" label="User" :rules="[{ required: true }]">
      <a-input placeholder="User" autocomplete="off" v-model:value="formState.smtp_user" />
    </a-form-item>
    <a-form-item name="smtp_password" label="Password" :rules="[{ required: true }]">
      <a-input placeholder="Password" type="password" autocomplete="off" v-model:value="formState.smtp_password" />
    </a-form-item>
    <a-form-item name="smtp_email_from" label="From email" :rules="[{ required: true }]">
      <a-input placeholder="test@example.com" autocomplete="off" v-model:value="formState.smtp_email_from" />
    </a-form-item>

    <a-form-item :wrapper-col="{ ...formConfig.wrapperCol, offset: 8 }">
      <a-space>
        <a-button :loading="loading" type="primary" html-type="submit">Submit</a-button>
        <a-button @click.prevent="openTest = true">Test</a-button>
      </a-space>
    </a-form-item>
  </a-form>
  <a-modal v-model:open="openTest" title="Send Test Email" @ok="sendTest">
    <a-form class="p-8" autocomplete="off" v-bind="formConfig" :model="formTest">
      <a-form-item class="w-full" name="email_to" label="Send to email" :rules="[{ required: true }]">
        <a-input placeholder="test@example.com" autocomplete="off" v-model:value="formTest.email_to" />
      </a-form-item>
    </a-form>
  </a-modal>
</template>
