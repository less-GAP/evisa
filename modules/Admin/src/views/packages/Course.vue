<script setup>

  import {reactive, ref, h, toRaw, watch} from "vue";
  import Api from "@/utils/Api";
  import router from "@/router";
  import {mdiDelete} from "@mdi/js";

  import {DataTable} from "@/components";

  import {PlusOutlined, LoadingOutlined, DeleteOutlined, FormOutlined} from '@ant-design/icons-vue';


  import InputUploadGetPath from "../../components/InputUploadGetPath.vue";

  import ProductList from "./ProductList.vue";

  import {notification} from "ant-design-vue";

  const emit = defineEmits(['submit', 'close']);

  const props = defineProps({
    value: Object,
  });

  const formRef = ref();

  const formState = ref({});

  const dataSource = ref([]);

  const isShowModal = ref(false);

  formState.value = props.value;
  if(props.value.products){
    dataSource.value = props.value.products;
  }


  const close = () => {
    emit('close');
  }

  const handleAdd = () => {
    isShowModal.value = true;
  };

  const columns = ref([
    {
      title: 'Hình ảnh',
      dataIndex: 'image',
      key: 'image',
      align: 'left'
    },
    {
      title: 'Tên sản phẩm',
      dataIndex: 'name',
      key: 'name',
      align: 'left'
    },
    {
      title: 'Giá niêm yết',
      dataIndex: 'price',
      key: 'price',
      align: 'right'
    },
    {
      title: 'Giá bán',
      dataIndex: 'sale_price',
      key: 'sale_price',
      align: 'right'
    },
    {
      title: 'Điểm thưởng',
      dataIndex: 'point',
      key: 'point',
      align: 'right'
    },
    {
      title: 'Hành động',
      key: 'action',
    },
  ]);

  const selectProduct = (selectItem) => {
    var check = false;
    if (dataSource.value.length > 0) {
      dataSource.value.forEach((value) => {
        if (parseInt(value.id) == parseInt(selectItem.id)) {
          check = true;
        }
      });
    } else {
      check = false;
    }
    if (check == false) {
      dataSource.value.push(selectItem);
    }
    isShowModal.value = false;
  }

  const removeSelect = (item) => {
    dataSource.value.forEach((value, index) => {
      if (parseInt(value.id) == parseInt(item.id)) {
        dataSource.value.splice(index, 1);
      }
    });
    //console.log(dataSource.value);
  }

  const onFinish = () => {
    formRef.value
      .validate()
      .then(() => {
        formState.value.packages = dataSource.value;
        emit('submit', formState.value);
      }).catch(error => {
      console.log(error);
      notification['error']({
        message: 'Thông báo',
        description: error,
      });
    });
  };

  watch(() => props.value, async () => {
    formState.value = props.value;
    dataSource.value = props.value.products;
  })

</script>
<template>
  <a-form v-if="formState" layout="vertical"
          ref="formRef"
          :model="formState"
          @finish="onFinish"
  >
    <a-tabs class="mt-2">
      <a-tab-pane key="1" tab="Thông tin chung">
        <a-row :gutter="20">
          <a-col :span="24">
            <a-form-item style="width:100%" label="Hình đại diện">
              <InputUploadGetPath width="200px" autocomplete="off" v-model:value="formState.image">
              </InputUploadGetPath>
            </a-form-item>
          </a-col>
          <a-col :span="24">
            <a-form-item label="Tên lộ trình"
                         name="name"
                         :rules="[{ required: true, message: 'Vui lòng nhập tên lộ trình!' }]"
            >
              <a-input v-model:value="formState.name" placeholder="Nhập.." class="text-xs"/>
            </a-form-item>
          </a-col>
          <a-col :span="24">
            <a-form-item label="Thời gian"
                         name="time"
                         :rules="[{ required: true, message: 'Vui lòng nhập thời gian!' }]"
            >
              <a-input v-model:value="formState.time" placeholder="Nhập.." class="text-xs"/>
            </a-form-item>
          </a-col>
          <a-col :span="8">
            <a-form-item label="Giá bán"
                         name="price"
                         :rules="[{ required: true, message: 'Vui lòng nhập giá bán sản phẩm!' }]"
            >
              <a-input-number v-model:value="formState.price" placeholder="Nhập.." class="text-xs"
                              style="width: 100%"
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
          <a-col :span="8">
            <a-form-item label="Tồn kho">
              <a-input-number v-model:value="formState.stock" placeholder="Nhập.." class="text-xs" style="width: 100%"
                              :formatter="value => `${value}`.replace(/\B(?=(\d{3})+(?!\d))/g, ',')"
                              :parser="value => value.replace(/\$\s?|(,*)/g, '')"
              />
            </a-form-item>
          </a-col>
          <a-col :span="24">
            <a-form-item label="Mô tả ngắn">
              <a-textarea v-model:value="formState.short_description" placeholder="Nhập..." :rows="4"/>
            </a-form-item>
          </a-col>
        </a-row>
      </a-tab-pane>
      <a-tab-pane key="2" tab="Sản phẩm trong lộ trình">
        <a-button type="primary" style="margin-bottom: 8px" @click="handleAdd" class="float-right" ghost>Thêm</a-button>
        <a-table :dataSource="dataSource" :columns="columns" v-if="dataSource.length > 0" :pagination="false">
          <template #bodyCell="{ column, record }">
            <template v-if="column.key === 'image'">
              <img class="w-20 h-auto float-left rounded-full" :src="record.image_url"
                   :alt="record.name"/>
            </template>
            <template v-if="column.key === 'price'">
              {{$format.formatMoney(record.price)}}
            </template>
            <template v-if="column.key === 'sale_price'">
              {{$format.formatMoney(record.sale_price)}}
            </template>
            <template v-if="column.key === 'point'">
              {{$format.formatNumber(record.point)}}
            </template>
            <template v-else-if="column.key === 'action'">
              <a-popconfirm
                title="Bạn muốn xóa sản phẩm ra khỏi gói này?"
                ok-text="Yes"
                cancel-text="No"
                @confirm="removeSelect(record)"
              >
                <a-button
                  type="text"
                  danger
                >
                  Xoá
                </a-button>
              </a-popconfirm>
            </template>
          </template>
        </a-table>
      </a-tab-pane>
    </a-tabs>
    <a-space align="center" :loading="loading" class="mt-5">
      <a-button type="primary" html-type="submit">Lưu</a-button>
      <a-button type="primary" ghost @click="close">Trở về</a-button>
    </a-space>
  </a-form>

  <a-modal v-model:open="isShowModal" width="70%" title="Danh sách sản phẩm" :footer="null">
    <ProductList @submit="selectProduct"></ProductList>
  </a-modal>

</template>
