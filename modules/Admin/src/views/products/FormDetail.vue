<script setup>
  import {reactive, ref} from "vue";
  import {PlusOutlined, LoadingOutlined} from '@ant-design/icons-vue';

  import 'jodit/es5/jodit.css';
  import { JoditEditor } from 'jodit-vue';

  import CKEditor from '@ckeditor/ckeditor5-vue';

  const formState = reactive({});


</script>

<template>
  <a-form layout="vertical" :model="formState">
    <a-tabs class="mt-2">
      <a-tab-pane key="1" tab="Thông tin chung">
        <a-row :gutter="20">
          <a-col :span="24">
            <a-form-item label="Hình ảnh">
              <a-upload
                v-model:file-list="fileList"
                name="avatar"
                list-type="picture-card"
                class="avatar-uploader"
                :show-upload-list="false"
                action="https://www.mocky.io/v2/5cc8019d300000980a055e76"
                :before-upload="beforeUpload"
                @change="handleChange"
              >
                <img v-if="imageUrl" :src="imageUrl" alt="avatar"/>
                <div v-else>
                  <loading-outlined v-if="loading"></loading-outlined>
                  <plus-outlined v-else></plus-outlined>
                  <div class="ant-upload-text">Tải lên</div>
                </div>
              </a-upload>
            </a-form-item>
          </a-col>
          <a-col :span="12">
            <a-form-item label="Loại sản phẩm">
              <a-select v-model:value="formState.type" placeholder="">
                <a-select-option value="product">Sản phẩm</a-select-option>
                <a-select-option value="package">Gói sản phẩm</a-select-option>
              </a-select>
            </a-form-item>
          </a-col>
          <a-col :span="12">
            <a-form-item label="Tình trạng">
              <a-select v-model:value="formState.status" placeholder="">
                <a-select-option value="A">Hoạt động</a-select-option>
                <a-select-option value="D">Tắt</a-select-option>
              </a-select>
            </a-form-item>
          </a-col>
          <a-col :span="24">
            <a-form-item label="Tên sản phẩm">
              <a-input v-model:value="formState.name" placeholder="Nhập.." class="text-xs"/>
            </a-form-item>
          </a-col>
          <a-col :span="8">
            <a-form-item label="Giá bán">
              <a-input v-model:value="formState.sale_price" placeholder="Nhập.." class="text-xs"/>
            </a-form-item>
          </a-col>
          <a-col :span="8">
            <a-form-item label="Giá niêm yết">
              <a-input v-model:value="formState.price" placeholder="Nhập.." class="text-xs"/>
            </a-form-item>
          </a-col>
          <a-col :span="8">
            <a-form-item label="Điểm thưởng">
              <a-input v-model:value="formState.point" placeholder="Nhập.." class="text-xs"/>
            </a-form-item>
          </a-col>
          <a-col :span="24">
            <a-form-item label="Mô tả ngắn">
              <a-textarea v-model:value="formState.short_description" placeholder="Nhập..." :rows="4"/>
            </a-form-item>
            <a-form-item label="Mô tả">
              <jodit-editor  style="height: 50vh" v-model="formState.description" :config="{
                iframe:true
              , height: '50vh',
              }"/>
            </a-form-item>
          </a-col>
        </a-row>
      </a-tab-pane>
      <a-tab-pane key="2" tab="Thông tin thêm">
        <a-row :gutter="20">
          <a-col :span="24">
            <a-form-item label="Link SEO">
              <a-input v-model:value="formState.slug" placeholder="Nhập.." class="text-xs"/>
            </a-form-item>
            <a-form-item label="Tiêu đề">
              <a-input v-model:value="formState.title" placeholder="Nhập.." class="text-xs"/>
            </a-form-item>
            <a-form-item label="Meta description">
              <a-textarea v-model:value="formState.meta_description" placeholder="Nhập..." :rows="4"/>
            </a-form-item>
            <a-form-item label="Meta keyword">
              <a-textarea v-model:value="formState.meta_keyword" placeholder="Nhập..." :rows="4"/>
            </a-form-item>
          </a-col>
        </a-row>
      </a-tab-pane>
    </a-tabs>
  </a-form>
</template>
