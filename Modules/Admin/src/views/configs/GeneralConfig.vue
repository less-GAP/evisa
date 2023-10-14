<script setup>
  import {reactive, ref} from "vue";
  import {message} from 'ant-design-vue';

  import Api from "@/utils/Api";
  import validateMessages from "@/utils/validateMessages";
  import {InputUpload, InputUploadGetPath} from "@/components";

  const configNames = [
    'site_title',
    'site_logo',
    'site_icon',
    'site_description',

    'copy_right',
    'site_login_bg',
    'site_login_bg_dynamic',
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
    <a-form-item name="site_title" label="Site title" :rules="[{ required: true }]">
      <a-input :showCount="true" maxlength="55"  autocomplete="off" v-model:value="formState.site_title"/>
    </a-form-item>
    <a-form-item name="site_description" label="Site description" :rules="[{ required: true }]">
      <a-textarea :showCount="true" maxlength="160"  autocomplete="off" v-model:value="formState.site_description"/>
    </a-form-item>
    <a-form-item name="copy_right" label="Copyright" :rules="[{ required: true }]">
        <a-textarea autocomplete="off" v-model:value="formState.copy_right"/>
      </a-form-item>
      <a-form-item name="site_login_bg" label="Login background">
        <InputUploadGetPath width="200px" alt="Site logo" autocomplete="off" v-model:value="formState.site_login_bg">
        </InputUploadGetPath>
      </a-form-item>
      <a-form-item name="site_login_bg_dynamic" label="Dynamic Login background (URL)">
        <a-input autocomplete="off" addon-before="https://source.unsplash.com/random/?" addon-after="/" class="rounded-lg" v-model:value="formState.site_login_bg_dynamic"/>
        <div class="small">https://source.unsplash.com/random/?screenprinting</div>
      </a-form-item>
    <a-form-item name="site_logo" label="Site Logo" :rules="[{ required: true }]">
      <InputUploadGetPath width="200px" alt="Site logo" autocomplete="off" v-model:value="formState.site_logo">
      </InputUploadGetPath>
    </a-form-item>
    <a-form-item name="site_icon" label="Favicon" :rules="[{ required: true }]">
      <InputUploadGetPath width="200px" alt="Favicon" autocomplete="off" v-model:value="formState.site_icon">
      </InputUploadGetPath>
    </a-form-item>

    <a-form-item>
      <a-space>
        <a-button :loading="loading" type="primary" html-type="submit">Submit</a-button>
      </a-space>
    </a-form-item>
  </a-form>

</template>
