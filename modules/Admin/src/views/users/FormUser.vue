<script setup>
import {reactive, ref} from "vue";

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

const submit = function () {
  emit('success')
}
const cancel = function () {
  emit('cancel')
}


</script>

<template>

  <a-form
    v-bind="formConfig"
    @finish="submit"
  >
    <a-form-item name="name" label="Name" :rules="[{ required: true }]">
      <a-input v-model:value="formState.name"/>
    </a-form-item>
    <a-form-item name="'email'" label="Email" :rules="[{ type: 'email',required: true  }]">
      <a-input v-model:value="formState.email"/>
    </a-form-item>
    <a-form-item name="age" label="Age" :rules="[{ type: 'number', min: 0, max: 99 }]">
      <a-input-number v-model:value="formState.age"/>
    </a-form-item>
    <a-form-item >
      <a-button type="primary" html-type="submit">Submit</a-button>
      <a-button @click="cancel" html-type="button">Cancel</a-button>
    </a-form-item>
  </a-form>

</template>
