<script setup>
  import {reactive, ref} from "vue";
  import {message} from 'ant-design-vue';

  import Api from "@/utils/Api";
  import validateMessages from "@/utils/validateMessages";
  import {InputUpload, InputUploadGetPath} from "@/components";

  // export default {
  //   components: {}
  // }


  const configNames = [
    'recaptcha_site_key',
    'recaptcha_secret_key',
    'google_id',
    'google_secret',
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
    
    <a-Divider class="!font-bold !text-blue-700" dashed orientation="left" orientation-margin="0" plain>reCaptcha</a-Divider>
    <a-form-item name="recaptcha_site_key" label="Recaptcha Site Key">
      <a-input autocomplete="off" v-model:value="formState.recaptcha_site_key" class="rounded border-gray-300"/>
    </a-form-item>
      
      <a-form-item name="recaptcha_secret_key" label="Recaptcha Secret Key">
        <a-input autocomplete="off" v-model:value="formState.recaptcha_secret_key" class="rounded border-gray-300"/>
    </a-form-item>
        
    <a-Divider class="!font-bold !text-blue-700" dashed orientation="left" orientation-margin="0" plain>Google</a-Divider>
    <a-form-item name="google_id" label="Google ID">
        <a-input autocomplete="off" v-model:value="formState.google_id" class="rounded border-gray-300"/>
    </a-form-item>

    <a-form-item name="google_secret" label="Google Secret">
        <a-input autocomplete="off" v-model:value="formState.google_secret" class="rounded border-gray-300"/>
    </a-form-item>

    <a-form-item>
      <a-space>
        <a-button :loading="loading" type="primary" html-type="submit">Submit</a-button>
      </a-space>
    </a-form-item>
  </a-form>

</template>
