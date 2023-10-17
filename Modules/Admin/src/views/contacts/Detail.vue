<script setup>
import {reactive, ref} from "vue";
import Api from "@/utils/Api";
import {message} from 'ant-design-vue';
import 'jodit/es5/jodit.css';
import {JoditEditor} from 'jodit-vue';
import router from "@/router";
import {ApiData} from "@/components";

const prefix = '/contact'
const routeList = prefix
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
const closeDetail = function () {
  router.replace({path: routeList})
}

</script>

<template>
  <a-drawer body-style="padding:0" :closable="false"
            style="position:relative;display:flex;flex-direction:column;height:100vh;"
            @close="closeDetail" :open="true" width="80vw">
    <div class="p-5">
      <ApiData :url="'contact/'+$route.params.id">
        <template #default="{data}">
          <a-row :gutter="20">
            <a-col :span="10">
              <a-descriptions :column="1" title="Contact Detail">
                <a-descriptions-item label="Title"><b>{{ data.title }}</b></a-descriptions-item>
                <a-descriptions-item label="Mail"><b>{{ data.email }}</b></a-descriptions-item>
                <a-descriptions-item label="Status">
                  <a-tag v-if="data.status=='waiting'" color="warning">{{ data.status }}</a-tag>
                  <a-tag v-if="data.status=='success'" color="success">{{ data.status }}</a-tag>
                  <a-tag v-if="data.status=='error'" color="red">{{ data.status }}
                  </a-tag>
                </a-descriptions-item>
              </a-descriptions>
            </a-col>
            <a-col :span="14">
              <a-card>
                {{ data.content }}
              </a-card>

            </a-col>
          </a-row>
        </template>
      </ApiData>
    </div>

  </a-drawer>
</template>
