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
    Api.get('countries/' + id).then(rs => {
      var product = rs.data.data;
      formState.value = product
      loading.value = false

    });
  }

  const onFinish = () => {
    formRef.value
      .validate()
      .then(() => {
        Api.post('countries', toRaw(formState.value)).then(rs => {
          notification[rs.data.code == 0 ? 'error' : 'success']({
            message: 'Thông báo',
            description: rs.data.message,
          });

          if (rs.data.code == 1) {
            router.push('/countries');
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
    router.push('/countries');
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
            <a-form-item label="Mã quốc gia"
                         name="code"
                         :rules="[{ required: true, message: 'Vui lòng nhập mã quốc gia!' }]"
            >
              <a-input v-model:value="formState.code" placeholder="Nhập.." class="text-xs"/>
            </a-form-item>
          </a-col>
          <a-col :span="12">
            <a-form-item label="Tên quốc gia"
                         name="name"
                         :rules="[{ required: true, message: 'Vui lòng nhập tên quốc gia!' }]"
            >
              <a-input v-model:value="formState.name" placeholder="Nhập.." class="text-xs"/>
            </a-form-item>
          </a-col>
        </a-row>
        <a-row :gutter="20">
          <a-col :span="12">
            <a-form-item label="Mã A3"
                         name="code_A3"
                         :rules="[{ required: true, message: 'Vui lòng nhập mã A3!' }]"
            >
              <a-input v-model:value="formState.code_A3" placeholder="Nhập.." class="text-xs"/>
            </a-form-item>
          </a-col>
          <a-col :span="12">
            <a-form-item label="Mã N3"
                         name="code_N3"
                         :rules="[{ required: true, message: 'Vui lòng nhập mã N3!' }]"
            >
              <a-input v-model:value="formState.code_N3" placeholder="Nhập.." class="text-xs"/>
            </a-form-item>
          </a-col>
        </a-row>
        <a-row :gutter="20">
          <a-col :span="12">
            <a-form-item label="Mã vùng"
                         name="region"
                         :rules="[{ required: true, message: 'Vui lòng nhập mã vùng!' }]"
            >
              <a-input v-model:value="formState.region" placeholder="Nhập.." class="text-xs"/>
            </a-form-item>
          </a-col>
          <a-col :span="12">
            <a-form-item label="Nhập vĩ độ(Latitude)"
                         name="latitude"

            >
              <a-input v-model:value="formState.latitude" placeholder="Nhập.." class="text-xs"/>
            </a-form-item>
          </a-col>
        </a-row>
        <a-row :gutter="20">
          <a-col :span="12">
            <a-form-item label="Nhập kinh độ(Longitude)"
                         name="longitude"

            >
              <a-input v-model:value="formState.longitude" placeholder="Nhập.." class="text-xs"/>
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
