<script lang="ts" setup>
import {reactive, ref, toRaw} from "vue";
import {useMainStore} from "@/stores/main";
import {
  mdiAccount,
  mdiMail,
  mdiAsterisk,
  mdiFormTextboxPassword,
  mdiGithub,
} from "@mdi/js";
import SectionMain from "@/components/SectionMain.vue";

import LayoutAuthenticated from "@/layouts/LayoutAuthenticated.vue";

import SectionTitleLineWithButton from "@/components/SectionTitleLineWithButton.vue";

import {PlusOutlined, LoadingOutlined, DeleteOutlined} from '@ant-design/icons-vue';

import router from "@/router";

import Api from "@/utils/Api";

import 'jodit/es5/jodit.css';

import {JoditEditor} from 'jodit-vue';

import {notification} from 'ant-design-vue';

import type {UploadProps} from 'ant-design-vue';


const mainStore = useMainStore();

const loading = ref(false);

const activeKey = ref('1');

const formRef = ref();

const formState = ref({});

const fileList = ref<UploadProps['fileList']>([]);

const uploading = ref<boolean>(false);

const isShowModal = ref(false)

var id = router.currentRoute.value.params.id;
if (id > 0) {
  loading.value = true
  Api.get('video/' + id).then(rs => {
    var product = rs.data.data;
    formState.value = product
    var file = {
      uid: '-1',
      name: product.image,
      url: product.image_url,
    };
    fileList.value = [...(fileList.value || []), file];
    loading.value = false

  });
}

const onFinish = () => {
  formRef.value
    .validate()
    .then(() => {
      Api.post('video', toRaw(formState.value)).then(rs => {
        notification[rs.data.code == 0 ? 'error' : 'success']({
          message: 'Thông báo',
          description: rs.data.message,
        });

        if (rs.data.code == 1) {
          router.replace('/videos');
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
  router.replace('/videos');
};


const beforeUpload: UploadProps['beforeUpload'] = file => {
  fileList.value = [...(fileList.value || []), file];
  return false;
};

const handleChange = (data) => {
  //console.log(data.file)
  const formData = new FormData();
  formData.append('image', data.file);
  loading.value = true;
  Api.post('video/uploadVideo', formData, {
    headers: {
      'Content-Type': 'multipart/form-data',

    }
  }).then(rs => {
    if (rs.data.url != '') {
      formState.value.file = rs.data;
      formState.value.path = rs.data.name;
      //imageUrl.value = rs.data.url;
    }
    loading.value = false;
    //fileList.value = [];
  });
};

</script>

<template>
  <LayoutAuthenticated>
    <SectionMain>
      <SectionTitleLineWithButton :icon="mdiAccount" :title="id == '0' ? 'Thêm video' : 'Cập nhật video'" main></SectionTitleLineWithButton>
      <a-form layout="vertical"
              ref="formRef"
              :model="formState"
              @finish="onFinish"
      >
        <a-row :gutter="20">
          <a-col :span="24">
            <a-form-item label="Video">
              <div class="clearfix">
                <a-upload
                  v-model:file-list="fileList"
                  name="avatar"
                  list-type="picture-card"
                  :before-upload="beforeUpload"
                  @change="handleChange"
                  @preview="handlePreview"
                  :max-count="1"
                  :show-upload-list="true"
                >

                  <div>
                    <loading-outlined v-if="loading"></loading-outlined>
                    <plus-outlined v-else></plus-outlined>
                    <div style="margin-top: 8px">Tải lên</div>
                  </div>
                </a-upload>
              </div>
            </a-form-item>
          </a-col>
          <a-col :span="12">
            <a-form-item label="Tình trạng"
                         name="status"
                         :rules="[{ required: true, message: 'Vui lòng chọn tình trạng!' }]"
            >
              <a-select v-model:value="formState.status" placeholder="">
                <a-select-option value="A">Hoạt động</a-select-option>
                <a-select-option value="D">Tắt</a-select-option>
              </a-select>
            </a-form-item>
          </a-col>
          <a-col :span="24">
            <a-form-item label="Tên video"
                         name="name"
                         :rules="[{ required: true, message: 'Vui lòng nhập tên video!' }]"
            >
              <a-input v-model:value="formState.name" placeholder="Nhập.." class="text-xs"/>
            </a-form-item>
          </a-col>
          <a-col :span="24">
            <a-form-item label="Mô tả ngắn">
              <a-textarea v-model:value="formState.short_description" placeholder="Nhập..." :rows="4"/>
            </a-form-item>
            <a-form-item label="Mô tả">
              <jodit-editor v-if="!loading" style="height: 50vh" v-model="formState.description" :config="{
                iframe:true,
                 height: '50vh',
                 iframeStyle: 'html{margin:0;padding:0;min-height: 100%;}body{box-sizing:border-box;font-family:roboto;font-size:16px;line-height:1.6;padding:10px;margin:0;background:transparent;color:#000;position:relative;z-index:2;user-select:auto;margin:0px;overflow:auto;outline:none;}table{width:100%;border:none;border-collapse:collapse;empty-cells: show;max-width: 100%;}th,td{padding: 2px 5px;border:1px solid #ccc;-webkit-user-select:text;-moz-user-select:text;-ms-user-select:text;user-select:text}p{margin-top:0;}.jodit_editor .jodit_iframe_wrapper{display: block;clear: both;user-select: none;position: relative;}.jodit_editor .jodit_iframe_wrapper:after {position:absolute;content:\'\';z-index:1;top:0;left:0;right: 0;bottom: 0;cursor: pointer;display: block;background: rgba(0, 0, 0, 0);} .jodit_disabled{user-select: none;-o-user-select: none;-moz-user-select: none;-khtml-user-select: none;-webkit-user-select: none;-ms-user-select: none}',
                  toolbarButtonSize: 'large',
              }"/>
            </a-form-item>
          </a-col>
        </a-row>

        <a-space align="center">
          <a-button type="primary" html-type="submit">Lưu</a-button>
          <a-button type="primary" ghost @click="back()">Trở về</a-button>
        </a-space>
      </a-form>
    </SectionMain>
  </LayoutAuthenticated>

</template>

<style>
.ant-input {
  border-color: #d9d9d9 !important;
  border-radius: 5px !important;
}
</style>
