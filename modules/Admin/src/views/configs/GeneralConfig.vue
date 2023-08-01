<script setup>
import {reactive, ref} from "vue";
import { message } from 'ant-design-vue';

import Api from "@/utils/Api";
import validateMessages from "@/utils/validateMessages";
import {InputUpload} from "@/components";
const configNames =[
  'site_title',
  'site_logo',
  'site_description',
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
const fetch =  function () {
  loading.value = true
  Api.get('config', {params:{names:configNames}}).then(result => {
    console.log(444,result)
  }).catch(e=>
  {
  }).finally(loading.value = false)
}
fetch();
const submit = async function () {
  loading.value = true
  Api.post('user', formState).then(result => {
    emit('success', result)
  }).catch(e=>
  {
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
    <a-form-item name="site_title" label="Site title" :rules="[{ required: true }]">
      <a-input  autocomplete="off" v-model:value="formState.site_title"/>
    </a-form-item>
    <a-form-item name="site_description" label="Site description" :rules="[{ required: true }]">
      <a-textarea  autocomplete="off" v-model:value="formState.site_description"/>
    </a-form-item>
    <a-form-item name="site_logo" label="Site Logo" :rules="[{ required: true }]">
      <InputUpload  autocomplete="off" v-model:value="formState.site_logo"/>
    </a-form-item>

    <a-form-item>
      <a-space>
        <a-button :loading="loading" type="primary" html-type="submit">Submit</a-button>
        <a-button @click="cancel" html-type="button">Cancel</a-button>
      </a-space>
    </a-form-item>
  </a-form>

</template>
