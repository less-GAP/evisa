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
  country_code: null,
  province_code: null
});

var id = router.currentRoute.value.params.id;
if (id > 0) {
  loading.value = true
  Api.get('orders/' + id).then(rs => {
    var product = rs.data.data;
    formState.value = product
    loading.value = false

  });
}

const countries = ref<SelectProps['options']>([]);
const provices = ref<SelectProps['options']>([]);
const districts = ref<SelectProps['options']>([]);

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

if (formState.value.country_code != null) {
  getProvinces();
}

if (formState.value.province_code != null) {
  getDistricts();
}

const getProvinces = () => {
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

const getDistricts = () => {
  Api.get('districts/all?country_code=' + formState.value.country_code + '&province_code=' + formState.value.province_code).then(rs => {
    if (rs.data.length > 0) {
      rs.data.forEach((item, index) => {
        var op = {
          value: item.code,
          label: item.code + ' - ' + item.name,
        };
        districts.value.push(op);
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
      Api.post('wards', toRaw(formState.value)).then(rs => {
        notification[rs.data.code == 0 ? 'error' : 'success']({
          message: 'Thông báo',
          description: rs.data.message,
        });

        if (rs.data.code == 1) {
          router.push('/wards');
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
  router.push('/wards');
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
          <a-col :span="16">
            <a-card title="Thông tin sản phẩm">

            </a-card>
          </a-col>
          <a-col :span="8">

            <a-list item-layout="vertical" bordered>
              <a-list-item>
                <a-list-item-meta>
                  <template #title>
                    <b>Thông tin khách hàng</b>
                  </template>
                  <template #description>
                    <p>Nguyễn Văn A</p>
                    <p>097747971</p>
                    <p>vana.nguyen@test.com</p>
                  </template>
                </a-list-item-meta>
              </a-list-item>
              <a-list-item>
                <a-list-item-meta>
                  <template #title>
                    <b>Phương thức thanh toán</b>
                  </template>
                  <template #description>
                    <p>C.O.D(Thanh toán tiền mặt khi nhận hàng)</p>
                  </template>
                </a-list-item-meta>
              </a-list-item>
              <a-list-item>
                <a-list-item-meta>
                  <template #title>
                    <b>Phương thức giao hàng</b>
                  </template>
                  <template #description>
                    <p>Giao hàng tiêu chuẩn (3 - 5 ngày)</p>
                  </template>
                </a-list-item-meta>
              </a-list-item>
              <a-list-item>
                <a-list-item-meta>
                  <template #title>
                    <b>Thông  giao hàng</b>
                  </template>
                  <template #description>
                    <p>Nguyễn Văn A</p>
                    <p>097747971</p>
                    <p>206 Đường số 7, Phường 7, Quận Gò Vấp, Hồ Chí Minh, Việt Nam</p>
                  </template>
                </a-list-item-meta>
              </a-list-item>
            </a-list>
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
