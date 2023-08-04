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

  const mainStore = useMainStore();

  const loading = ref(false);

  const formRef = ref();

  const formState = ref({});

  var id = router.currentRoute.value.params.id;
  if (id > 0) {
    loading.value = true
    Api.get('payment-method/' + id).then(rs => {
      var product = rs.data.data;
      formState.value = product
      loading.value = false
    });
  }

  const onFinish = () => {
    formRef.value
      .validate()
      .then(() => {
        Api.post('payment-method', toRaw(formState.value)).then(rs => {
          notification[rs.data.code == 0 ? 'error' : 'success']({
            message: 'Thông báo',
            description: rs.data.message,
          });

          if (rs.data.code == 1) {
            router.push('/payment-method');
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
    router.push('/payment-method');
  };


</script>

<template>
  <LayoutAuthenticated>
    <SectionMain>
      <a-form layout="vertical"
              ref="formRef"
              :model="formState"
              @finish="onFinish"
      >
        <a-row :gutter="20">
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
        </a-row>
        <a-row :gutter="20">
          <a-col :span="12">
            <a-form-item label="Mã phương thức thanh toán"
                         name="code"
                         :rules="[{ required: true, message: 'Vui lòng nhập phương thức thanh toán!' }]"
            >
              <a-input v-model:value="formState.code" placeholder="Nhập.." class="text-xs"/>
            </a-form-item>
          </a-col>
        </a-row>
        <a-row :gutter="20">
          <a-col :span="24">
            <a-form-item label="Tên phương thức thanh toán"
                         name="name"
                         :rules="[{ required: true, message: 'Vui lòng nhập tên phương thức thanh toán!' }]"
            >
              <a-input v-model:value="formState.name" placeholder="Nhập.." class="text-xs"/>
            </a-form-item>
          </a-col>
        </a-row>
        <a-row :gutter="20">
          <a-col :span="24">
            <a-form-item label="Mô tả ngắn">
              <a-textarea v-model:value="formState.short_description" placeholder="Nhập..." :rows="4"/>
            </a-form-item>
          </a-col>
        </a-row>
        <a-row :gutter="20">
          <a-col :span="24">
            <a-form-item label="Mô tả">
              <jodit-editor v-if="!loading" style="height: 50vh" v-model="formState.description" :config="{
                iframe:true,
                 height: '50vh',
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
