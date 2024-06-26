<script lang="ts" setup>
import {reactive, h, ref, toRaw} from "vue";
import LayoutAuthenticated from "@/layouts/LayoutAuthenticated.vue";

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
import {UseEloquentRouter} from "@/utils/UseEloquentRouter";
import {InputTags, InputUploadGetPath, FilePicker, InputCopy} from "@/components";

const prefix = 'page'
const routePrefix = '/content-management/page'

const {
  fetchDetailApi,
  createApi,
  deleteApi,
  updateApi
} = UseEloquentRouter(prefix)

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
const formState = reactive({
  content: '',
  template: 'default',
  tags: []
});
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

const closeDetail = function () {
  router.replace({path: routePrefix})
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
            class="bg-gray-50 stick-top shadow ">
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
      <a-col :lg="18" :md="24">
        <a-card>
          <a-row :gutter="20">
            <a-col :span="24">
              <a-form-item label="Title"
                           name="title"
                           :rules="[{ required: true }]"
              >
                <a-input :showCount="true" maxlength="55"
                         @keyup="($event)=>{formState.slug=String($event.target.value).slugify()}"
                         v-model:value="formState.title"
                         placeholder="Title.."/>
              </a-form-item>
              <a-form-item label="Slug"
                           name="slug"
              >
                <a-input v-model:value="formState.slug" placeholder="Title.."/>
              </a-form-item>
              <a-form-item label="Url"
              >
                <InputCopy :value="$url(formState.slug)" :readonly="true"></InputCopy>
              </a-form-item>
            </a-col>

            <a-col :span="24">

              <a-form-item label="Mô tả">
                <HtmlEditor  v-model:value="formState.content"
                />
              </a-form-item>
              <a-form-item name="excerpt" :rules="[{ required: true }]" label="Mô tả ngắn">
                <a-textarea :showCount="true" maxlength="160" v-model:value="formState.excerpt" placeholder="Excerpt..."
                            :rows="4"/>
              </a-form-item>
            </a-col>
          </a-row>

        </a-card>

      </a-col>
      <a-col :lg="6" :md="24">

        <a-card class="mt-5">
          <a-form-item style="width:100%" label="Feature image">
            <InputUploadGetPath width="200px" autocomplete="off" v-model:value="formState.image">
            </InputUploadGetPath>
          </a-form-item>
          <!--              <a-form-item style="width:100%" label="Hình ảnh">-->
          <!--                <InputUpload :multiple="true" alt="" autocomplete="off"-->
          <!--                             v-model:value="formState.images"></InputUpload>-->
          <!--              </a-form-item>-->
        </a-card>
        <a-card class="mt-5" title="Template">
          <a-select v-model:value="formState.template">
            <a-select-option value="default">Full Page</a-select-option>
            <a-select-option value="sidebar">Sidebar Widget</a-select-option>
          </a-select>

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
