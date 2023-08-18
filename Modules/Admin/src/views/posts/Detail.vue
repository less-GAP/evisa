<script lang="ts" setup>
import {reactive, ref, toRaw} from "vue";
import SectionMain from "@/components/SectionMain.vue";
import {FilePicker} from "@/components";

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

import ProductList from "./ProductList.vue";
import InputUploadGetPath from "../../components/InputUploadGetPath.vue";
import {InputTags} from "@/components";

const mainStore = useMainStore();

const loading = ref(false);
const showPicker = ref(false);

const activeKey = ref('1');

const formRef = ref();
const onSelectImage = function () {
};

const formState = reactive({
  content:'',
  tags:[]
});


const isShowModal = ref(false)

const fetch = function () {
  loading.value = true;
  var id = router.currentRoute.value.params.id;
  if (id > 0) {
    loading.value = true
    Api.get('product/' + id).then(rs => {
      var product = rs.data;
      formState = product;
      loading.value = false
    });
  } else {
    loading.value = false
  }
}
fetch();

const onFinish = () => {
  formRef.value
    .validate()
    .then(() => {
      Api.post('product', toRaw(formState.value)).then(rs => {
        notification[rs.data.code == 0 ? 'error' : 'success']({
          message: 'Thông báo',
          description: rs.data.message,
        });

        if (rs.data.code == 1) {
          router.push('/products');
        }
      });
    })
    .catch(error => {
      notification['error']({
        message: 'Thông báo',
        description: error,
      });
    });
};

const back = () => {
  router.push('/products');
};



const tabActive = (val) => {
  if (val == 2) { //load danh sach san pham

  }
};

</script>

<template>
  <LayoutAuthenticated>
    <SectionMain>
      <a-form v-if="formState" layout="vertical"
              v-bind="$config.formConfig"
              ref="formRef"
              :model="formState"
              @finish="onFinish"
      >
        <a-row :gutter="50">
          <a-col :lg="18" :md="24">
            <a-card>
              <a-row :gutter="20">
                <a-col :span="24">
                  <a-form-item label="Title"
                               name="name"
                               :rules="[{ required: true, message: 'Vui lòng nhập tên sản phẩm!' }]"
                  >
                    <a-input v-model:value="formState.title" placeholder="Title.." />
                  </a-form-item>
                </a-col>

                <a-col :span="24">

                  <a-form-item label="Mô tả">
                    <jodit-editor v-if="!loading " style="height: 50vh" v-model="formState.content" :config="{
                iframe:true,
                 height: '50vh',
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
                  <a-form-item label="Mô tả ngắn">
                    <a-textarea v-model:value="formState.excerpt" placeholder="Excerpt..." :rows="4"/>
                  </a-form-item>
                </a-col>
              </a-row>

            </a-card>

          </a-col>
          <a-col :lg="6" :md="24">
            <a-card>
              <a-space class="flex " align="right">
                <a-button :loading="loading" type="primary" html-type="submit">Save</a-button>
              </a-space>
            </a-card>
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
            <a-card class="mt-5">
              <a-form-item style="width:100%" label="Tags">
                <InputTags v-model:value="formState.tags"></InputTags>
              </a-form-item>

            </a-card>
          </a-col>
        </a-row>
      </a-form>

    </SectionMain>
  </LayoutAuthenticated>
  <a-modal append-to-body v-model:open="showPicker" style="z-index:99999;top: 2vh;height:98vh" height="96vh" width="90vw"
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
.ant-modal-wrap{
  z-index: 100001!important;
}
</style>
