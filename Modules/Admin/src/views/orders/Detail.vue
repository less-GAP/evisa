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
      var order = rs.data.data;
      formState.value = order;
      loading.value = false;
    });
  }


  const columns = [
    {
      title: 'Hình ảnh',
      dataIndex: 'image',
      key: 'image',
    },
    {
      title: 'Sản phẩm',
      dataIndex: 'product_name',
      key: 'product_name',
    },
    {
      title: 'Số lượng',
      dataIndex: 'amount',
      key: 'amount',
      align: 'right'
    },
    {
      title: 'Đơn giá',
      dataIndex: 'price',
      key: 'price',
      align: 'right'
    },
    {
      title: 'Thành tiền',
      key: 'subtotal',
      dataIndex: 'subtotal',
      align: 'right'
    },
  ];


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
            router.push('/orders');
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
    router.push('/orders');
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
              <a-table :columns="columns" :data-source="formState.details" :pagination="false">
                <template #bodyCell="{ column, record }">
                  <template v-if="column.key === 'image'">
                    <img class="w-20 h-auto float-left rounded-full" :src="record.product_image_url"
                         :alt="record.product_name"/>
                  </template>

                  <template v-if="column.key === 'price'">
                    {{$format.formatMoney(record.price)}}
                  </template>

                  <template v-if="column.key === 'subtotal'">
                    {{$format.formatMoney(record.subtotal)}}
                  </template>

                </template>
                <template #summary>
                  <a-table-summary-row>
                    <a-table-summary-cell colSpan="4" align="right"><b>Thành tiền</b></a-table-summary-cell>
                    <a-table-summary-cell align="right">
                      <a-typography-text>{{$format.formatMoney(formState.subtotal)}}</a-typography-text>
                    </a-table-summary-cell>
                  </a-table-summary-row>
                  <a-table-summary-row>
                    <a-table-summary-cell colSpan="4" align="right"><b>Giảm giá</b></a-table-summary-cell>
                    <a-table-summary-cell align="right">
                      <a-typography-text>{{$format.formatMoney(formState.discount)}}</a-typography-text>
                    </a-table-summary-cell>
                  </a-table-summary-row>
                  <a-table-summary-row>
                    <a-table-summary-cell colSpan="4" align="right"><b>Phí vận chuyển</b></a-table-summary-cell>
                    <a-table-summary-cell align="right">
                      <a-typography-text>{{$format.formatMoney(formState.shipping_cost)}}</a-typography-text>
                    </a-table-summary-cell>
                  </a-table-summary-row>
                  <a-table-summary-row>
                    <a-table-summary-cell colSpan="4" align="right"><b>Tổng tiền</b></a-table-summary-cell>
                    <a-table-summary-cell align="right">
                      <a-typography-text>{{$format.formatMoney(formState.total)}}</a-typography-text>
                    </a-table-summary-cell>
                  </a-table-summary-row>
                </template>
              </a-table>
              <h4 class="mt-5"><b>Ghi chú</b></h4>
              <p>{{formState.notes}}</p>
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
                    <p>{{formState.customer_name}}</p>
                    <p>{{formState.customer_phone}}</p>
                    <p>{{formState.customer_email}}</p>
                  </template>
                </a-list-item-meta>
              </a-list-item>
              <a-list-item>
                <a-list-item-meta>
                  <template #title>
                    <b>Phương thức thanh toán</b>
                    <a-tag color="green" v-if="formState.payment_status == 'success'">Thành công</a-tag>
                  </template>
                  <template #description>
                    <p>{{formState.payment_name}}</p>

                  </template>
                </a-list-item-meta>
              </a-list-item>
              <a-list-item>
                <a-list-item-meta>
                  <template #title>
                    <b>Phương thức giao hàng</b>
                    <a-tag color="blue" v-if="formState.shipping_status == 'waiting_confirm'">Chờ xác nhận</a-tag>
                  </template>
                  <template #description>
                    <p>{{formState.shipping_name}}</p>
                  </template>
                </a-list-item-meta>
              </a-list-item>
              <a-list-item>
                <a-list-item-meta>
                  <template #title>
                    <b>Thông giao hàng</b>
                  </template>
                  <template #description>
                    <p>{{formState.s_name}}</p>
                    <p>{{formState.s_phone}}</p>
                    <p>{{formState.s_address}}, {{formState.ward_name}}, {{formState.district_name}}, {{formState.province_name}}, {{formState.country_name}}</p>
                  </template>
                </a-list-item-meta>
              </a-list-item>
            </a-list>
          </a-col>
        </a-row>
        <a-form-item :wrapper-col="{ offset: 8, span: 12 }" class="mt-5">
          <a-button type="primary" html-type="submit" v-if="false">Lưu</a-button>
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
