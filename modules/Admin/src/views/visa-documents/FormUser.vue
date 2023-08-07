<script setup>
import {reactive, ref} from "vue";
import Api from "@/utils/Api";
import { message } from 'ant-design-vue';
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
    <a-form-item name="username" label="UserName" :rules="[{ required: true }]">
      <a-input  autocomplete="off" v-model:value="formState.username"/>
    </a-form-item>
    <a-form-item name="full_name" label="Full Name" :rules="[{ required: true }]">
      <a-input v-model:value="formState.full_name"/>
    </a-form-item>
    <a-form-item name="email" label="Email" :rules="[{ type: 'email',required: true  }]">
      <a-input v-model:value="formState.email"/>
    </a-form-item>
    <a-form-item label="Role" name="role">
      <a-radio-group v-model:value="formState.role">
        <a-radio value="user" name="type">User</a-radio>
        <a-radio value="admin" name="type">Admin</a-radio>
      </a-radio-group>
    </a-form-item>
    <a-form-item
      label="Password"
      name="password"
      :rules="formState.isNew?[{ required: true, message: 'Please input your password!' }]:[]"
    >
      <a-input-password autocomplete="off" v-model:value="formState.password">
        <template #prefix>
          <LockOutlined class="site-form-item-icon"/>
        </template>
      </a-input-password>
    </a-form-item>

    <a-form-item>
      <a-space>
        <a-button :loading="loading" type="primary" html-type="submit">Submit</a-button>
        <a-button @click="cancel" html-type="button">Cancel</a-button>
      </a-space>
    </a-form-item>
  </a-form>

</template>
