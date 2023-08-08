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

  import type {SelectProps} from 'ant-design-vue';

  const mainStore = useMainStore();

  const loading = ref(false);

  const formRef = ref();

  const formState = ref({
    country_code: null
  });

  var id = router.currentRoute.value.params.id;
  if (id > 0) {
    loading.value = true
    Api.get('districts/' + id).then(rs => {
      var product = rs.data.data;
      formState.value = product
      loading.value = false

    });
  }

  const countries = ref<SelectProps['options']>([]);
  Api.get('countries/all').then(rs => {
    if (rs.data.length > 0) {
      rs.data.forEach((item, index) => {
        var op = {
          value: item.code,
          label: item.code + ' - ' + item.name,
        };
        countries.value.push(op);
      });
    }
  });

  const provices = ref<SelectProps['options']>([]);
  if (formState.value.country_code != null) {
    getProvinces();
  }

  const getProvinces = () => {
    console.log(formState.value.country_code);
    Api.get('provinces/all?country_code=' + formState.value.country_code).then(rs => {
      if (rs.data.length > 0) {
        rs.data.forEach((item, index) => {
          var op = {
            value: item.code,
            label: item.code + ' - ' + item.name,
          };
          provices.value.push(op);
        });
      }
    });
  };

  const filterOption = (input: string, option: any) => {
    return option.label.toLowerCase().indexOf(input.toLowerCase()) >= 0 || option.value.toLowerCase().indexOf(input.toLowerCase()) >= 0;
  };

  const onFinish = () => {
    formRef.value
      .validate()
      .then(() => {
        Api.post('districts', toRaw(formState.value)).then(rs => {
          notification[rs.data.code == 0 ? 'error' : 'success']({
            message: 'Thông báo',
            description: rs.data.message,
          });

          if (rs.data.code == 1) {
            router.push('/districts');
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
    router.push('/districts');
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
          <a-col :span="12" :offset="6">
            <a-form-item label="Quốc gia"
                         name="country_code"
                         :rules="[{ required: true, message: 'Vui lòng nhập mã quốc gia!' }]"
            >
              <a-select
                ref="select"
                placeholder="Chọn quốc gia..."
                show-search
                :filter-option="filterOption"
                v-model:value="formState.country_code"
                :options="countries"
                @change="getProvinces"
              ></a-select>

            </a-form-item>
          </a-col>
        </a-row>
        <a-row :gutter="20">
          <a-col :span="12" :offset="6">
            <a-form-item label="Tỉnh/thành phố"
                         name="province_code"
                         :rules="[{ required: true, message: 'Vui lòng nhập tỉnh/thành phố!' }]"
            >
              <a-select
                ref="select"
                placeholder="Chọn tỉnh/thành phố..."
                show-search
                :filter-option="filterOption"
                v-model:value="formState.province_code"
                :options="provices"
              ></a-select>

            </a-form-item>
          </a-col>
        </a-row>
        <a-row :gutter="20">
          <a-col :span="12" :offset="6">
            <a-form-item label="Mã quận/huyện"
                         name="code"
                         :rules="[{ required: true, message: 'Vui lòng nhập mã quận/huyện!' }]"
            >
              <a-input v-model:value="formState.code" placeholder="Nhập.." class="text-xs"/>
            </a-form-item>
          </a-col>

        </a-row>
        <a-row :gutter="20">
          <a-col :span="12" :offset="6">
            <a-form-item label="Tên quận/huyện"
                         name="name"
                         :rules="[{ required: true, message: 'Vui lòng nhập quận/huyện!' }]"
            >
              <a-input v-model:value="formState.name" placeholder="Nhập.." class="text-xs"/>
            </a-form-item>
          </a-col>
        </a-row>
        <a-row :gutter="20">
          <a-col :span="12" :offset="6">
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

        <a-form-item :wrapper-col="{ offset: 6, span: 12 }">
          <a-button type="primary" html-type="submit">Lưu</a-button>
          <a-button type="primary" ghost @click="back()" class="ml-5">Trở về</a-button>
        </a-form-item>
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
