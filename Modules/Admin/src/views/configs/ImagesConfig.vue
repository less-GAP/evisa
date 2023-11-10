<script setup>
import {reactive, ref} from "vue";
import {message} from 'ant-design-vue';

import Api from "@/utils/Api";
import validateMessages from "@/utils/validateMessages";
import {InputUpload, InputUploadGetPath} from "@/components";

const configNames = [
  'home_banner',
  'loading_image',
  'visa_placeholder_2',
  'visa_placeholder_2',
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
    <a-space>

      <a-form-item name="home_banner" label="Home banner">
        <InputUploadGetPath width="200px" alt="Site logo" autocomplete="off" v-model:value="formState.home_banner">
        </InputUploadGetPath>
      </a-form-item>
      <a-form-item name="visa_placeholder_photo" label="Visa Photo (4x6cm) Placeholder" >
        <InputUploadGetPath width="200px" alt="Favicon" autocomplete="off" v-model:value="formState.visa_placeholder_photo">
        </InputUploadGetPath>
      </a-form-item>
      <a-form-item name="visa_placeholder_passport" label="Visa Passport Placeholder" >
        <InputUploadGetPath width="200px" alt="Favicon" autocomplete="off" v-model:value="formState.visa_placeholder_passport">
        </InputUploadGetPath>
      </a-form-item>
      <a-form-item name="loading_image" label="Page Loader" >
        <InputUploadGetPath width="200px" alt="Favicon" autocomplete="off" v-model:value="formState.loading_image">
        </InputUploadGetPath>
      </a-form-item>
    </a-space>

    <a-form-item>
      <a-space>
        <a-button :loading="loading" type="primary" html-type="submit">Submit</a-button>
      </a-space>
    </a-form-item>
  </a-form>

</template>
