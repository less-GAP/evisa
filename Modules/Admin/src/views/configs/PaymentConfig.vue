<script setup>
  import {reactive, ref} from "vue";
  import {message} from 'ant-design-vue';

  import Api from "@/utils/Api";
  import validateMessages from "@/utils/validateMessages";
  import {InputUpload, InputUploadGetPath} from "@/components";

  const configNames = [
    'square_app_id',
    'square_access_token',
    'square_location_id',
    'square_environment',
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
    <a-form-item name="square_app_id" label="Square App Id" :rules="[{ required: true }]">
      <a-input :showCount="true" maxlength="55"  autocomplete="off" v-model:value="formState.square_app_id"/>
    </a-form-item>
    <a-form-item name="square_location_id" label="Square Location Id" :rules="[{ required: true }]">
      <a-input :showCount="true" maxlength="55"  autocomplete="off" v-model:value="formState.square_location_id"/>
    </a-form-item>
    <a-form-item name="square_access_token" label="Square Access Token" :rules="[{ required: true }]">
      <a-textarea  maxlength="160"  autocomplete="off" v-model:value="formState.square_access_token"/>
    </a-form-item>
    <a-form-item name="square_environment" label="Square Environment" :rules="[{ required: true }]">
      <a-select  v-model:value="formState.square_environment" id="">
        <a-select-option value="sandbox">Sandbox</a-select-option>
        <a-select-option value="production">Production</a-select-option>
        <a-select-option value="custom">Custom</a-select-option>
      </a-select>
    </a-form-item>


    <a-form-item>
      <a-space>
        <a-button :loading="loading" type="primary" html-type="submit">Submit</a-button>
      </a-space>
    </a-form-item>
  </a-form>

</template>
