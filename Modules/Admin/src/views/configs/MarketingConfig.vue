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
  'twilio_account_sid',
  'twilio_auth_token',
  'twilio_auth_key',
  'twilio_auth_secret',
  'twilio_auth_flow_id',
  'twilio_phone_number',
  'sendgrid_api_key',
  'sendgrid_from_email',
  'sendgrid_from_name',
  'sendbird_app_id',
  'sendbird_api_token',
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

    <a-Divider class="!font-bold !text-blue-700" dashed orientation="left" orientation-margin="0" plain>Twilio</a-Divider>

    <a-form-item name="twilio_account_sid" label="Twilio Account SID">
      <a-input autocomplete="off" v-model:value="formState.twilio_account_sid" class="rounded border-gray-300"/>
    </a-form-item>

    <a-form-item name="twilio_auth_token" label="Twilio Auth Token">
      <a-input autocomplete="off" v-model:value="formState.twilio_auth_token" class="rounded border-gray-300"/>
    </a-form-item>

    <a-form-item name="twilio_auth_token" label="Twilio API key">
      <a-input autocomplete="off" v-model:value="formState.twilio_auth_key" class="rounded border-gray-300"/>
    </a-form-item>

    <a-form-item name="twilio_auth_token" label="Twilio API Secret">
      <a-input autocomplete="off" v-model:value="formState.twilio_auth_secret" class="rounded border-gray-300"/>
    </a-form-item>

    <a-form-item name="twilio_auth_token" label="Twilio Stuido Flow ID">
      <a-input autocomplete="off" v-model:value="formState.twilio_auth_flow_id" class="rounded border-gray-300"/>
    </a-form-item>

    <a-form-item name="twilio_phone_number" label="Twilio Phone Number">
      <a-input autocomplete="off" v-model:value="formState.twilio_phone_number" class="rounded border-gray-300"/>
    </a-form-item>

    <a-Divider class="!font-bold !text-blue-700" dashed orientation="left" orientation-margin="0" plain>SendGrid</a-Divider>

    <a-form-item name="sendgrid_api_key" label="SendGrid API Key">
      <a-input autocomplete="off" v-model:value="formState.sendgrid_api_key" class="rounded border-gray-300"/>
    </a-form-item>

    <a-form-item name="sendgrid_from_email" label="SendGrid From Email">
      <a-input autocomplete="off" v-model:value="formState.sendgrid_from_email" class="rounded border-gray-300"/>
    </a-form-item>

    <a-form-item name="sendgrid_from_name" label="SendGrid From Name">
      <a-input autocomplete="off" v-model:value="formState.sendgrid_from_name" class="rounded border-gray-300"/>
    </a-form-item>

    <a-Divider class="!font-bold !text-blue-700" dashed orientation="left" orientation-margin="0" plain>SendBird</a-Divider>

    <a-form-item name="sendbird_app_id" label="SendBird App ID">
      <a-input autocomplete="off" v-model:value="formState.sendbird_app_id" class="rounded border-gray-300"/>
    </a-form-item>

    <a-form-item name="sendbird_api_token" label="SendBird API Token">
      <a-input autocomplete="off" v-model:value="formState.sendbird_api_token" class="rounded border-gray-300"/>
    </a-form-item>


    <a-form-item>
      <a-space>
        <a-button :loading="loading" type="primary" html-type="submit">Submit</a-button>
      </a-space>
    </a-form-item>
  </a-form>

</template>
