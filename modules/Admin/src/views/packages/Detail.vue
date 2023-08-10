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

  import {InputUpload} from "@/components";

  import router from "@/router";

  import Api from "@/utils/Api";

  import 'jodit/es5/jodit.css';

  import {JoditEditor} from 'jodit-vue';

  import {notification} from 'ant-design-vue';

  import type {UploadProps} from 'ant-design-vue';

  import ProductList from "./ProductList.vue";

  import Course from "./Course.vue";

  import InputUploadGetPath from "../../components/InputUploadGetPath.vue";

  const mainStore = useMainStore();

  const loading = ref(false);

  const activeKey = ref('1');

  const formRef = ref();

  const formState = ref({
    type: 'package',
  });

  const packages = ref([]);

  const dataSource = ref([]);

  const isShowModal = ref(false);

  const isShowCourse = ref(false);

  const courseData = ref({});

  const fetch = function () {
    loading.value = true;
    var id = router.currentRoute.value.params.id;
    if (id > 0) {
      Api.get('package/' + id).then(rs => {
        var product = rs.data.data;
        formState.value = product;
        if (product.packages) {
          dataSource.value = product.packages;
        }
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
        formState.value.packages = dataSource.value;
        Api.post('package', toRaw(formState.value)).then(rs => {
          notification[rs.data.code == 0 ? 'error' : 'success']({
            message: 'Thông báo',
            description: rs.data.message,
          });

          if (rs.data.code == 1) {
            router.push('/packages');
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
    router.push('/packages');
  };


  const columns = ref([
    {
      title: 'Hình ảnh',
      dataIndex: 'image',
      key: 'image',
      align: 'left'
    },
    {
      title: 'Tên lộ trình',
      dataIndex: 'name',
      key: 'name',
      align: 'left'
    },
    {
      title: 'Giá bán',
      dataIndex: 'price',
      key: 'price',
      align: 'right'
    },
    {
      title: 'Điểm thưởng',
      dataIndex: 'point',
      key: 'point',
      align: 'right'
    },
    {
      title: 'Mô tả',
      dataIndex: 'short_description',
      key: 'short_description',
      align: 'left',
      width: '300px'
    },
    {
      title: 'Hành động',
      key: 'action',
    },
  ]);

  const handleAdd = () => {
    isShowModal.value = true;
  };

  const addCourse = (item) => {
    courseData.value = item;
    isShowCourse.value = true;
  };

  const submitCourse = (courseData) => {
    var check = false;
    if (dataSource.value.length > 0) {
      dataSource.value.forEach((value) => {
        if (parseInt(value.id) == parseInt(courseData.id)) {
          check = true;
        }
      });
    } else {
      check = false;
    }
    if (check == false) {
      dataSource.value.push(courseData);
    }
    isShowCourse.value = false;
  }


  const removeCourse = (item) => {
    dataSource.value.forEach((value, index) => {
      if (value.id == item.id) {
        dataSource.value.splice(index, 1);
      }
    });
  }

  const closeCourse = () => {
    isShowCourse.value = false;
  }

</script>

<template>
  <LayoutAuthenticated>
    <SectionMain>
      <a-form v-if="formState" layout="vertical"
              ref="formRef"
              :model="formState"
              @finish="onFinish"
      >
        <a-tabs class="mt-2" v-model:activeKey="activeKey" @change="tabActive">
          <a-tab-pane key="1" tab="Thông tin chung">
            <a-row :gutter="20">
              <a-col :span="24">
                <a-form-item style="width:100%" label="Hình đại diện">
                  <InputUploadGetPath width="200px" autocomplete="off" v-model:value="formState.image">
                  </InputUploadGetPath>
                </a-form-item>
                <a-form-item style="width:100%" label="Hình ảnh" v-if="false">
                  <InputUpload :multiple="true" alt="" autocomplete="off" v-model:value="formState.images"></InputUpload>
                </a-form-item>
              </a-col>

              <a-col :span="24">
                <a-form-item label="Tên gói sản phẩm"
                             name="name"
                             :rules="[{ required: true, message: 'Vui lòng nhập tên gói sản phẩm!' }]"
                >
                  <a-input v-model:value="formState.name" placeholder="Nhập.." class="text-xs"/>
                </a-form-item>
              </a-col>
              <a-col :span="8">
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
              <a-col :span="8">
                <a-form-item label="Vị trí trang chủ"
                             name="position"
                             :rules="[{ required: true, message: 'Vui lòng chọn vị trí!' }]"
                >
                  <a-select v-model:value="formState.position" placeholder="">
                    <a-select-option value="left">Trái</a-select-option>
                    <a-select-option value="right">Phải</a-select-option>
                  </a-select>
                </a-form-item>
              </a-col>
              <a-col :span="8">
                <a-form-item label="Màu nền"
                             name="background"
                             :rules="[{ required: true, message: 'Vui lòng nhập màu nền!' }]"
                >
                  <a-input v-model:value="formState.background" placeholder="Nhập.." class="text-xs"/>
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
              }"/>
                </a-form-item>
              </a-col>
            </a-row>
          </a-tab-pane>
          <a-tab-pane key="2" tab="Lộ trình">
            <a-row :gutter="20">
              <a-col :span="24">
                <a-button type="primary" style="margin-bottom: 8px" @click="addCourse({})" class="float-right" ghost>Thêm</a-button>
                <a-table :dataSource="dataSource" :columns="columns" v-if="dataSource.length > 0" :pagination="false" style="width: 100%">
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
                      <a-button
                        type="link"
                        @click="addCourse(record)"
                      >
                        Cập nhật
                      </a-button>
                      <a-popconfirm
                        title="Bạn muốn xóa lộ trình này?"
                        ok-text="Yes"
                        cancel-text="No"
                        @confirm="removeCourse(record)"
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
              </a-col>
            </a-row>
          </a-tab-pane>
          <a-tab-pane key="3" tab="Thông tin thêm">
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
        <a-space align="center" :loading="loading" class="mt-5">
          <a-button type="primary" html-type="submit">Lưu</a-button>
          <a-button type="primary" ghost @click="back()">Trở về</a-button>
        </a-space>
      </a-form>
    </SectionMain>
  </LayoutAuthenticated>

  <a-modal v-model:open="isShowModal" width="70%" title="Danh sách sản phẩm" :footer="null">
    <ProductList @submit="selectProduct"></ProductList>
  </a-modal>

  <a-drawer v-model:open="isShowCourse" width="70%" title="Chi tiết lộ trình" :footer="null" placement="right">
    <Course @submit="submitCourse" @close="closeCourse" :value="courseData"></Course>
  </a-drawer>
</template>

<style>
  .ant-input {
    border-color: #d9d9d9 !important;
    border-radius: 5px !important;
  }
</style>
