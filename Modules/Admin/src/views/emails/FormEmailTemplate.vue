<script setup>
import {reactive, ref} from "vue";
import Api from "@/utils/Api";
import {message} from 'ant-design-vue';
import 'jodit/es5/jodit.css';
import {JoditEditor, Jodit} from 'jodit-vue';

window.buttons = Jodit.defaultOptions.buttons
import router from "@/router";
import {mdiBackspace} from "@mdi/js";
import {BaseIcon} from "@/components";

const prefix = 'email/templates'
const routeList = '/' + prefix

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
const loading = ref(true)
const error = ref(null)
const formState = reactive({
  isNew: true,
  name: "",
  email_cc: [],
  email_bcc: [],
  username: "",
  email_content: "",
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
const fetch = async function (id) {
  loading.value = true
  Api.get('email-template/' + id).then(result => {
    loading.value = false
    Object.assign(formState, result.data)
    if (router.currentRoute.value.params.type == 'clone') {
      formState.id = null
      formState.name = null
    }
  })

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
const buttons = reactive([
  {"group": "font-style", "buttons": []},
  // {"group": "list", "buttons": []},
//   {
//   "group": "font",
//   "buttons": []
// },
//   "---", {"group": "script", "buttons": []}, {"group": "media", "buttons": []}, "\n", {
//   "group": "state",
//   "buttons": []
// },
//   {"group": "clipboard", "buttons": []}, {"group": "insert", "buttons": []}, {
//   "group": "indent",
//   "buttons": []
// },
  {"group": "color", "buttons": []},
//   {"group": "form", "buttons": []}, "---", {
//   "group": "history",
//   "buttons": []
// },
//   {"group": "search", "buttons": []},
  {"group": "source", "buttons": []},
//   {
//   "group": "other",
//   "buttons": []
// },
  // {"group": "info", "buttons": []}
])

</script>

<template>
  <a-drawer body-style="padding:0" :closable="false"
            style="position:relative;display:flex;flex-direction:column;height:100vh;"
            @close="closeDetail" :open="true" width="90vw">

    <div>
      <div class=" overflow-y-auto">
        <a-form
          autocomplete="off"
          v-bind="formConfig"
          @finish="submit"
        >
          <div class="p-3 bg-gray-200">
            <a-button class="!hidden md:!inline-block" type="link" @click="closeDetail">
              <template #icon>
                <div class="flex">
                  <BaseIcon :path="mdiBackspace" class="w-4 text-stone-500"/>
                  <span class="ml-1 text-stone-500">Back</span>
                </div>
              </template>
            </a-button>
            <a-button class="!inline-flex items-center justify-center md:!hidden !w-8 !h-8 !p-0" type="link"
                      @click="closeDetail">
              <template #icon>
                <div class="flex">
                  <BaseIcon :path="mdiBackspace" class="w-4 text-stone-500"/>
                  <span class="ml-1 text-stone-500">Back</span>
                </div>
              </template>
            </a-button>
            <a-space class="float-right">
              <a-button class="mr-5" :loading="loading" type="primary" html-type="submit">Submit</a-button>

            </a-space>
          </div>
          <a-row style="height:calc(100vh - 100px);" class="p-5" :gutter="20">
            <a-col :span="8">
              <a-form-item class="w-full " name="name" label="Template name" :rules="[{ required: true }]">
                <a-input autocomplete="off" v-model:value="formState.name"/>
              </a-form-item>
              <a-form-item class="w-full " name="email_title" label="Mail title" :rules="[{ required: true }]">
                <a-input autocomplete="off" v-model:value="formState.email_title"/>
              </a-form-item>
              <a-form-item class="w-full" name="email_reply_to" label="Reply to">

                <a-input autocomplete="off" v-model:value="formState.email_reply_to"/>
              </a-form-item>
              <a-form-item class="w-full" name="email_cc" label="Mail cc">
                <a-select
                  v-model:value="formState.email_cc"
                  mode="tags"
                  style="width: 100%"
                  :token-separators="[',']"
                ></a-select>

              </a-form-item>
              <a-form-item class="w-full" name="email_bcc" label="Mail bcc">
                <a-select
                  v-model:value="formState.email_bcc"
                  mode="tags"
                  style="width: 100%"
                  :token-separators="[',']"
                ></a-select>

              </a-form-item>
              <a-form-item class="w-full" name="status" label="Status">
                <a-switch checkedValue="active" unCheckedValue="inactive"
                          v-model:checked="formState.status"/>

              </a-form-item>
            </a-col>
            <a-col :span="16">
              <a-form-item class="w-full" name="email_title" label="Mail Content" :rules="[{ required: true }]">
                <jodit-editor v-if="!loading" style="height: 80vh"
                              v-model="formState.email_content" :config="{
                buttons,
                 height: '70vh',
                 iframeStyle: 'html{margin:0;padding:0;min-height: 100%;}body{box-sizing:border-box;font-family:roboto;font-size:16px;line-height:1.6;padding:10px;margin:0;background:transparent;color:#000;position:relative;z-index:2;user-select:auto;margin:0px;overflow:auto;outline:none;}table{width:100%;border:none;border-collapse:collapse;empty-cells: show;max-width: 100%;}th,td{padding: 2px 5px;border:1px solid #ccc;-webkit-user-select:text;-moz-user-select:text;-ms-user-select:text;user-select:text}p{margin-top:0;}.jodit_editor .jodit_iframe_wrapper{display: block;clear: both;user-select: none;position: relative;}.jodit_editor .jodit_iframe_wrapper:after {position:absolute;content:\'\';z-index:1;top:0;left:0;right: 0;bottom: 0;cursor: pointer;display: block;background: rgba(0, 0, 0, 0);} .jodit_disabled{user-select: none;-o-user-select: none;-moz-user-select: none;-khtml-user-select: none;-webkit-user-select: none;-ms-user-select: none}',
                toolbarButtonSize: 'large',
              }"/>
              </a-form-item>
            </a-col>

          </a-row>
        </a-form>
      </div>
    </div>


  </a-drawer>
</template>
