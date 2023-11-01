<script lang="ts" setup>
import {reactive, h, ref, toRaw} from "vue";

import {useMainStore} from "@/stores/main";
import {
  mdiAccount,
  mdiMail,
  mdiAsterisk,
  mdiFormTextboxPassword,
  mdiGithub,
} from "@mdi/js";

import {PlusOutlined, LoadingOutlined, DeleteOutlined} from '@ant-design/icons-vue';

import router from "@/router";

import Api from "@/utils/Api";

import 'jodit/es5/jodit.css';

import {JoditEditor, Jodit} from 'jodit-vue';

import {notification} from 'ant-design-vue';

import type {UploadProps} from 'ant-design-vue';

import {InputTags, InputCategories, InputUploadGetPath, FilePicker, InputCopy} from "@/components";
import {createApi, newModel, formConfig, fetchDetailApi} from "./meta";
import {back} from "./meta";

const routePrefix = '/content-management/faq'

const mainStore = useMainStore();

const loading = ref(false);
const showPicker = ref(false);

const activeKey = ref('1');

const formRef = ref();
let onSelectImage = function () {
};
const props = defineProps({
  value: {
    type: Object,
    default: {}
  }, visible: {
    type: Boolean,
    default: true
  },
})
const emit = defineEmits(["close"]);
const formState = reactive({...newModel});
const isShowModal = ref(false)

const fetch = async function () {
  loading.value = true;
  var id = router.currentRoute.value.params.id;
  if (id > 0) {
    loading.value = true
    const value = await fetchDetailApi(id)
    Object.assign(formState, value.data)
    loading.value = false
  } else {
    loading.value = false
  }
}
fetch();

const submit = (status) => {
  formRef.value
    .validate()
    .then(() => {
      createApi({...formState, status: status}).then(rs => {
        Object.assign(formState, rs.data.result)
      });
    })

};
const visible = ref(true)
const closeDetail = function () {
    router.replace(routePrefix)
}


</script>

<template>

  <a-form v-if="formState" layout="vertical"
          v-bind="formConfig"
          ref="formRef"
          :model="formState"
          @finish="onFinish"
  >
    <a-card body-style="padding:10px;height:55px;"
            class="bg-gray-50  ">
      <a-button :icon="h(ArrowLeftOutlined)" class="float-left" type="link" @click="closeDetail"> Back to list
      </a-button>
      <a-space class="flex items-end float-right " align="right">
        <!--                <a-button v-if="formState.rule_detect_category_link" @click="detectCategory" :loading="loadingDraft" >Test Category</a-button>-->
        <a-tag v-if="formState.status=='publish'" color="success">Published</a-tag>
        <a-tag v-else-if="formState.status" color="orange">{{ formState.status }}</a-tag>
        <a-button @click="submit('draft')" :loading="loadingDraft" type="dashed">Save Draft</a-button>
        <a-button @click="submit('publish')" :loading="loading" type="primary">Save And Active</a-button>
      </a-space>
    </a-card>
    <a-row style="height:calc(100% - 55px);overflow: auto;padding:0;" class="mt-5 shadow" :gutter="50">
      <a-col :lg="24" :md="24">
        <a-card>
          <a-row :gutter="20">
            <a-col :span="24">
              <a-form-item name="question" :rules="[{ required: true }]" label="Question">
                <a-textarea :showCount="true" maxlength="160" v-model:value="formState.question"
                            placeholder="Question..."
                            :rows="4"/>
              </a-form-item>
            </a-col>

            <a-col :span="24">

              <a-form-item label="Answer">
                <jodit-editor v-if="!loading " style="height: 50vh" v-model="formState.answer" :config="{
                iframe:true,
                 height: '50vh',
                 iframeStyle: 'html{margin:0;padding:0;min-height: 100%;}body{box-sizing:border-box;font-family:roboto;font-size:16px;line-height:1.6;padding:10px;margin:0;background:transparent;color:#000;position:relative;z-index:2;user-select:auto;margin:0px;overflow:auto;outline:none;}table{width:100%;border:none;border-collapse:collapse;empty-cells: show;max-width: 100%;}th,td{padding: 2px 5px;border:1px solid #ccc;-webkit-user-select:text;-moz-user-select:text;-ms-user-select:text;user-select:text}p{margin-top:0;}.jodit_editor .jodit_iframe_wrapper{display: block;clear: both;user-select: none;position: relative;}.jodit_editor .jodit_iframe_wrapper:after {position:absolute;content:\'\';z-index:1;top:0;left:0;right: 0;bottom: 0;cursor: pointer;display: block;background: rgba(0, 0, 0, 0);} .jodit_disabled{user-select: none;-o-user-select: none;-moz-user-select: none;-khtml-user-select: none;-webkit-user-select: none;-ms-user-select: none}',
                  toolbarButtonSize: 'large',
                 buttons: [
                   ...Jodit.defaultOptions.buttons,
                    {
                      name: 'Select Image',
                      tooltip: 'Select Image',
                      exec: (editor) => {
                        showPicker=true
                        onSelectImage=function(images){
                          images.forEach(function(image){
                            showPicker = false
                            const html =`<img width=100% title=`+image.title+` src=`+image.file_url+` />`;
                                                       editor.s.insertHTML(html);
                          })
                        }
                        // editor.s.insertHTML(new Date().toDateString());
                      }
                    }
                  ]
              }"/>
              </a-form-item>

            </a-col>
          </a-row>

        </a-card>

      </a-col>
    </a-row>
  </a-form>
  <a-modal append-to-body v-model:open="showPicker" style="z-index:99999;top: 2vh;height:98vh" height="96vh"
           width="90vw"
           title="Select file">
    <FilePicker :multiple="true" @close="showPicker=false" @select="onSelectImage"></FilePicker>
    <template #footer>
    </template>
  </a-modal>
</template>

<style>
.ant-input {
  border-color: #d9d9d9 !important;
  border-radius: 5px !important;
}

.ant-modal-wrap {
  z-index: 100001 !important;
}
</style>
