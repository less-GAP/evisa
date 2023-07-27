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

  import {PlusOutlined, LoadingOutlined} from '@ant-design/icons-vue';

  import router from "@/router";

  import Api from "@/utils/Api";

  import 'jodit/es5/jodit.css';

  import {JoditEditor} from 'jodit-vue';

  import {notification} from 'ant-design-vue';

  const mainStore = useMainStore();

  var id = router.currentRoute.value.params.id;

  const loading = ref(false);

  const imageUrl = ref('');

  const formRef = ref();

  const formState = reactive({});

  const onFinish = () => {

    formRef.value
      .validate()
      .then(() => {
        Api.post('product', toRaw(formState)).then(rs => {
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
  import type {UploadProps} from 'ant-design-vue';

  const fileList = ref<UploadProps['fileList']>([]);
  const uploading = ref<boolean>(false);
  const beforeUpload: UploadProps['beforeUpload'] = file => {
    fileList.value = [...(fileList.value || []), file];
    return false;
  };

  const handleChange = (data) => {
    //console.log(data.file)
    const formData = new FormData();
    formData.append('image', data.file);
    loading.value = true;
    Api.post('product/uploadImage', formData, {
      headers: {
        'Content-Type': 'multipart/form-data'
      }
    }).then(rs => {
      if (rs.data.url != '') {
        formState.file = rs.data;
        formState.image = rs.data.name;
        imageUrl.value = rs.data.url;
      }
      loading.value = false;
      fileList.value = [];
    });
  };


</script>

<template>
  <LayoutAuthenticated>
    <SectionMain>
      <SectionTitleLineWithButton :icon="mdiAccount" :title="id == '0' ? 'Thêm sản phẩm' : 'Cập nhật sản phẩm'" main></SectionTitleLineWithButton>
      <a-form layout="vertical"
              ref="formRef"
              :model="formState"
              @finish="onFinish"
      >
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
                    :before-upload="beforeUpload"
                    @change="handleChange"
                  >
                    <img v-if="imageUrl" :src="imageUrl" alt="avatar"/>
                    <div v-else>
                      <loading-outlined v-if="loading"></loading-outlined>
                      <plus-outlined v-else></plus-outlined>
                      <div class="ant-upload-text">Upload</div>
                    </div>
                  </a-upload>
                </a-form-item>
              </a-col>
              <a-col :span="12">
                <a-form-item label="Loại sản phẩm" name="type"
                             :rules="[{ required: true, message: 'Vui lòng chọn loại sản phẩm!' }]"
                >
                  <a-select v-model:value="formState.type" placeholder=""

                  >
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
                  <a-input-number v-model:value="formState.sale_price" placeholder="Nhập.." class="text-xs"
                                  :formatter="value => `${value}`.replace(/\B(?=(\d{3})+(?!\d))/g, ',')"
                                  :parser="value => value.replace(/\$\s?|(,*)/g, '')"
                                  style="width: 100%"
                  />
                </a-form-item>
              </a-col>
              <a-col :span="8">
                <a-form-item label="Giá niêm yết">
                  <a-input-number v-model:value="formState.price" placeholder="Nhập.." class="text-xs" style="width: 100%"
                                  :formatter="value => `${value}`.replace(/\B(?=(\d{3})+(?!\d))/g, ',')"
                                  :parser="value => value.replace(/\$\s?|(,*)/g, '')"
                  />
                </a-form-item>
              </a-col>
              <a-col :span="8">
                <a-form-item label="Điểm thưởng">
                  <a-input-number v-model:value="formState.point" placeholder="Nhập.." class="text-xs" style="width: 100%"
                                  :formatter="value => `${value}`.replace(/\B(?=(\d{3})+(?!\d))/g, ',')"
                                  :parser="value => value.replace(/\$\s?|(,*)/g, '')"
                  />
                </a-form-item>
              </a-col>
              <a-col :span="24">
                <a-form-item label="Mô tả ngắn">
                  <a-textarea v-model:value="formState.short_description" placeholder="Nhập..." :rows="4"/>
                </a-form-item>
                <a-form-item label="Mô tả">
                  <jodit-editor style="height: 50vh" v-model="formState.description" :config="{
                iframe:true,
                 height: '50vh',
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
