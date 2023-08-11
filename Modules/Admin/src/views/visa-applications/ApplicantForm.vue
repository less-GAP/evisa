<script setup>
import {reactive, ref} from "vue";
import Api from "@/utils/Api";
import { message } from 'ant-design-vue';
import {InputUpload} from "@/components";
const props = defineProps({
  value: Object
})

const validateMessages = {
  required: '${label} is required!',
  types: {
    email: '${label} is not a valid email!',
    number: '${label} is not a valid number!',
  },
  number: {
    range: '${label} must be between ${min} and ${max}',
  },
};

const emit = defineEmits(["success", "cancel"]);
const loading = ref(false)
const error = ref(null)
const formState = reactive(props.value || {
  isNew: true,
  full_name: "",
  username: "",
  email: "",
  role: "user",
  password: "",
});

const formConfig = reactive({
  "validateTrigger": "submit",
  "label-align": "top",
  "model": formState,
  labelCol: {span: 24},
  wrapperCol: {span: 24},
  "validate-messages": validateMessages,
});
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
    <a-form-item class="w-1/2 inline-flex" name="username" label="Photo (4x6cm, white background)" :rules="[{ required: true }]">
      <InputUpload placeholder="upload/photo.jpg" width="153px" height="230px" v-model:value="formState.profile_photo"></InputUpload>
    </a-form-item>
    <a-form-item class="w-1/2  inline-flex" name="username" label="Passport scan" :rules="[{ required: true }]">
      <InputUpload placeholder="upload/passport.jpg" width="346px" height="230px" v-model:value="formState.passport_photo"></InputUpload>
    </a-form-item>
    <a-form-item name="full_name" label="Full name as in passport" :rules="[{ required: true }]">
      <a-input v-model:value="formState.full_name"/>
    </a-form-item>
    <a-form-item name="full_name" label="Nationality" :rules="[{ required: true }]">
      <a-input v-model:value="formState.nationality"/>
    </a-form-item>
    <a-form-item name="full_name" label="Passport number" :rules="[{ required: true }]">
      <a-input v-model:value="formState.passport_number"/>
    </a-form-item>
    <a-form-item name="full_name" label="Email" :rules="[{ required: true }]">
      <a-input v-model:value="formState.email"/>
    </a-form-item>

  </a-form>

</template>
