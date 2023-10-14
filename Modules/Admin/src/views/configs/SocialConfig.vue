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
    'site_facebook',
    'site_instagram',
    'site_x',
    'site_tiktok',
    'site_youtube',
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
    <a-form-item name="site_facebook" label="Facebook">
      <a-input autocomplete="off" v-model:value="formState.site_facebook" class="rounded border-gray-300"/>
    </a-form-item>
    <a-form-item name="site_instagram" label="Instagram">
      <a-input autocomplete="off" v-model:value="formState.site_instagram" class="rounded border-gray-300"/>
    </a-form-item>
    <a-form-item name="site_x" label="X">
      <a-input autocomplete="off" v-model:value="formState.site_x" class="rounded border-gray-300"/>
    </a-form-item>
    <a-form-item name="site_tiktok" label="Tiktok">
      <a-input autocomplete="off" v-model:value="formState.site_tiktok" class="rounded border-gray-300"/>
    </a-form-item>
    <a-form-item name="site_youtube" label="Youtube">
      <a-input autocomplete="off" v-model:value="formState.site_youtube" class="rounded border-gray-300"/>
    </a-form-item>
    <a-form-item>
      <a-space>
        <a-button :loading="loading" type="primary" html-type="submit">Submit</a-button>
      </a-space>
    </a-form-item>
  </a-form>

</template>
