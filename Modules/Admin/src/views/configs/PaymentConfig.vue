<script setup>
import { reactive, ref } from "vue";
import { message } from 'ant-design-vue';

import Api from "@/utils/Api";
import validateMessages from "@/utils/validateMessages";
import { InputUpload, InputUploadGetPath } from "@/components";

const configNames = [
  'square_app_id',
  'square_access_token',
  'square_location_id',
  'square_environment',

  'paypal_client_id',
  'paypal_client_secret',
  'stripe_publishable_key',
  'stripe_secret_key',
]

const activeKey = ref('1');
const emit = defineEmits(["success", "cancel"]);
const loading = ref(false)
const error = ref(null)
const formState = reactive({
  select_payment: 'square',
});
const formConfig = reactive({
  "validateTrigger": "submit",
  "label-align": "top",
  "model": formState,
  labelCol: { span: 24 },
  wrapperCol: { span: 24 },
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

const cancel = function () {
  emit('cancel')
}

</script>

<template>
  <a-form autocomplete="off" v-bind="formConfig" @finish="submit">

    <a-Divider class="!font-bold !text-blue-700" dashed orientation="left" orientation-margin="0" plain>Select Payment
      method</a-Divider>

    <a-form-item name="select_payment" label="" :rules="[{ required: true }]">
      <a-radio-group v-model:value="formState.select_payment" button-style="solid">
        <a-radio-button value="square">Square</a-radio-button>
        <a-radio-button value="paypal">Paypal</a-radio-button>
        <a-radio-button value="stripe">Stripe</a-radio-button>
        <a-radio-button value="authorize">Authorize.net</a-radio-button>
      </a-radio-group>
    </a-form-item>

    <div v-if="formState.select_payment == 'square'">

      <a-form-item name="square_app_id" label="Square App Id" :rules="[{ required: true }]">
        <a-input :showCount="true" maxlength="55" autocomplete="off" v-model:value="formState.square_app_id" />
      </a-form-item>
      <a-form-item name="square_location_id" label="Square Location Id" :rules="[{ required: true }]">
        <a-input :showCount="true" maxlength="55" autocomplete="off" v-model:value="formState.square_location_id" />
      </a-form-item>
      <a-form-item name="square_access_token" label="Square Access Token" :rules="[{ required: true }]">
        <a-textarea maxlength="160" autocomplete="off" v-model:value="formState.square_access_token" />
      </a-form-item>
      <a-form-item name="square_environment" label="Square Environment" :rules="[{ required: true }]">
        <a-select v-model:value="formState.square_environment" id="">
          <a-select-option value="sandbox">Sandbox</a-select-option>
          <a-select-option value="production">Production</a-select-option>
          <a-select-option value="custom">Custom</a-select-option>
        </a-select>
      </a-form-item>
    </div>


    <div v-if="formState.select_payment == 'paypal'">


      <a-form-item name="paypal_client_id" label="Paypal Client ID">
        <a-input autocomplete="off" v-model:value="formState.paypal_client_id" class="rounded border-gray-300" />
      </a-form-item>

      <a-form-item name="paypal_client_secret" label="Paypal Client Secret">
        <a-input autocomplete="off" v-model:value="formState.paypal_client_secret" class="rounded border-gray-300" />
      </a-form-item>
    </div>

    <div v-if="formState.select_payment == 'stripe'">

      <a-form-item name="stripe_publishable_key" label="Stripe Publishable Key">
        <a-input autocomplete="off" v-model:value="formState.stripe_publishable_key" class="rounded border-gray-300" />
      </a-form-item>

      <a-form-item name="stripe_secret_key" label="Stripe Secret Key">
        <a-input autocomplete="off" v-model:value="formState.stripe_secret_key" class="rounded border-gray-300" />
      </a-form-item>
    </div>

    <div v-if="formState.select_payment == 'authorize'">

      <a-form-item name="authorize_api_login_id" label="Authorize.net API Login ID">
        <a-input autocomplete="off" v-model:value="formState.authorize_api_login_id" class="rounded border-gray-300" />
      </a-form-item>

      <a-form-item name="authorize_transaction_key" label="Authorize.net Transaction Key">
        <a-input autocomplete="off" v-model:value="formState.authorize_transaction_key" class="rounded border-gray-300" />
      </a-form-item>

      <a-form-item name="authorize_sandbox" label="Authorize.net Sandbox">
        <a-select v-model:value="formState.authorize_sandbox" id="">
          <a-select-option value="true">True</a-select-option>
          <a-select-option value="false">False</a-select-option>
        </a-select>
      </a-form-item>

    </div>

    <a-form-item>
      <a-space>
        <a-button :loading="loading" type="primary" html-type="submit">Submit</a-button>
      </a-space>
    </a-form-item>
  </a-form>
</template>
