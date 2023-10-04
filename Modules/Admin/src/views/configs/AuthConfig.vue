<script setup>
import {reactive, ref} from "vue";
import {message} from 'ant-design-vue';

import Api from "@/utils/Api";
import validateMessages from "@/utils/validateMessages";
import {InputUpload, InputUploadGetPath} from "@/components";

const configNames = [
  'login_google',
  'login_google_id',
  'login_google_secret',
]

const emit = defineEmits(["success", "cancel"]);
const loading = ref(false)
const error = ref(null)
const formState = reactive({});
const formConfig = reactive({
  "validateTrigger": "submit",
  "label-align": "top",
  "model": formState,
  labelCol: {span: 24},
  wrapperCol: {span: 24},
  "validate-messages": validateMessages,
});
const fetch = function () {
  loading.value = true
  Api.get('config', {params: {names: configNames}}).then(result => {
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

const cancel = function () {
  emit('cancel')
}

</script>

<template>

  <a-form
    autocomplete="off"
    v-bind="formConfig"
    @finish="submit"
  >
    <a-form-item name="login_google" label="Google login" :rules="[{ required: true }]">
      <a-switch checkedValue="active" unCheckedValue="inactive"
                v-model:checked="formState.login_google"/>
    </a-form-item>
    <a-form-item v-if="formState.login_google=='active'" name="login_google_id" label="Client Id" :rules="[{ required: true }]">
      <a-input :showCount="true" autocomplete="off" v-model:value="formState.login_google_id"/>
    </a-form-item>
    <a-form-item v-if="formState.login_google=='active'" name="login_google_secret" label="Client Secret" :rules="[{ required: true }]">
      <a-input :showCount="true" autocomplete="off" v-model:value="formState.login_google_secret"/>
    </a-form-item>

    <a-form-item>
      <a-space>
        <a-button :loading="loading" type="primary" html-type="submit">Submit</a-button>
      </a-space>
    </a-form-item>
  </a-form>

</template>
