<script setup>
import {reactive, ref} from "vue";
import Api from "@/utils/Api";
import {message} from 'ant-design-vue';
import 'jodit/es5/jodit.css';
import {JoditEditor} from 'jodit-vue';
import router from "@/router";

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
const id = router.currentRoute.value.params.id;

const formConfig = reactive({
  "validateTrigger": "submit",
  "label-align": "top",
  "model": formState,
  labelCol: {span: 24},
  wrapperCol: {span: 24},
  "validate-messages": validateMessages,
});
const fetch = function (id) {
  loading.value = true
  Api.get('email-template/' + id).then(result => {
    Object.assign(formState, result.data)
  }).catch(e => {
  }).finally(loading.value = false)
}
if (id) {
  fetch(id)
}
const submit = async function () {
  loading.value = true
  Api.post('email-template', formState).then(result => {
    router.replace('/email/templates')
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
    <a-row :gutter="20">
      <a-col :span="8">
        <a-form-item class="w-full " name="email_title" label="Mail title" :rules="[{ required: true }]">
          <a-input autocomplete="off" v-model:value="formState.email_title"/>
        </a-form-item>
        <a-form-item class="w-full" name="email_reply_to" label="Reply to">
          <a-input  autocomplete="off" v-model:value="formState.email_reply_to"/>
        </a-form-item>
        <a-form-item class="w-full" name="email_cc" label="Mail cc">
          <a-input placeholder="Split with ;" autocomplete="off" v-model:value="formState.email_cc"/>
        </a-form-item>
        <a-form-item class="w-full" name="email_bcc" label="Mail bcc">
          <a-input  placeholder="Split with ;"  autocomplete="off" v-model:value="formState.email_bcc"/>
        </a-form-item>
      </a-col>
      <a-col :span="16">
        <a-form-item class="w-full" name="email_title" label="Mail Content" :rules="[{ required: true }]">
          <jodit-editor style="height: 50vh" v-model="formState.email_content" :config="{
                iframe:true,
                 height: '50vh',
              }"/>
        </a-form-item>
      </a-col>
      <div class="min-w-full text-center mt-20">
        <a-button class="mr-5" :loading="loading" type="primary" html-type="submit">Submit</a-button>
        <router-link to="/email/templates" @click="cancel" html-type="button">Back</router-link>
      </div>
    </a-row>


  </a-form>

</template>
