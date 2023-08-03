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

  import type {UploadProps, SelectProps} from 'ant-design-vue';

  import VideoList from "./VideoList.vue";

  const mainStore = useMainStore();

  const loading = ref(false);

  const activeKey = ref('1');

  const formRef = ref();

  const formState = ref({});

  const uploading = ref<boolean>(false);

  const isShowModal = ref(false)


  const CustomerGroups = ref<SelectProps['options']>([]);

  Api.get('series/customer-groups').then(rs => {
    if (rs.data.length > 0) {
      rs.data.forEach((item, index) => {
        var op = {
          value: item.id,
          label: item.name,
        };
        CustomerGroups.value.push(op);
      });
    }
  });
  console.log(CustomerGroups.value);

  var id = router.currentRoute.value.params.id;
  if (id > 0) {
    loading.value = true
    Api.get('series/' + id).then(rs => {
      var series = rs.data.data;
      formState.value = series
      formState.value.customer_group = parseInt(rs.data.data.customer_group);
      loading.value = false;
      dataSource.value = rs.data.data.videos;
    });
  }


  const onFinish = () => {
    formRef.value
      .validate()
      .then(() => {
        formState.value.videos = dataSource.value;
        Api.post('series', toRaw(formState.value)).then(rs => {
          notification[rs.data.code == 0 ? 'error' : 'success']({
            message: 'Thông báo',
            description: rs.data.message,
          });

          if (rs.data.code == 1) {
            router.push('/series');
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
    router.push('/series');
  };

  const dataSource = ref([]);

  const columns = ref([
    {
      title: 'Tên video',
      dataIndex: 'name',
      key: 'name',
      class: 'text-left'
    },
    {
      title: 'Hành động',
      key: 'action',
    },
  ]);

  const handleAdd = () => {
    isShowModal.value = true;
  };

  const selectVideo = (selectItem) => {
    //console.log(selectItem);
    if (dataSource.value.length > 0) {
      dataSource.value.forEach((value, index) => {
        if (value.id != selectItem.id) {
          dataSource.value.push(selectItem);
        }
      });
    } else {
      dataSource.value.push(selectItem);
    }
    isShowModal.value = false;
  }

  const removeSelect = (item) => {
    dataSource.value.forEach((value, index) => {
      if (value.id == item.id) {
        dataSource.value.splice(index, 1);
      }
    });
    //console.log(dataSource.value);
  }

  const previewVisible = ref(false);
  const previewUrl = ref('');
  const previewTitle = ref('');

  const handleCancel = () => {
    previewVisible.value = false;
    previewTitle.value = '';
  };

  const handlePreview = (item) => {
    previewUrl.value = item.path_full;
    previewVisible.value = true;
    previewTitle.value = item.name;
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
        <a-tabs class="mt-2">
          <a-tab-pane key="1" tab="Thông tin chung">
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
                <a-form-item label="Nhóm khách hàng"
                             name="customer_group"
                             :rules="[{ required: true, message: 'Vui lòng chọn tình trạng!' }]"
                >
                  <a-select v-model:value="formState.customer_group" v-if="!loading"
                            :options="CustomerGroups"
                  >
                  </a-select>
                </a-form-item>
              </a-col>
            </a-row>
            <a-row :gutter="20">
              <a-col :span="24">
                <a-form-item label="Tên Series"
                             name="name"
                             :rules="[{ required: true, message: 'Vui lòng nhập tên video!' }]"
                >
                  <a-input v-model:value="formState.name" placeholder="Nhập.." class="text-xs"/>
                </a-form-item>
              </a-col>
              <a-col :span="24">
                <a-form-item label="Mô tả">
                  <a-textarea v-model:value="formState.short_description" placeholder="Nhập..." :rows="4"/>
                </a-form-item>
                <a-form-item label="Mô tả" v-if="false">
                  <jodit-editor v-if="!loading" style="height: 50vh" v-model="formState.description" :config="{
                iframe:true,
                 height: '50vh',
              }"/>
                </a-form-item>
              </a-col>
            </a-row>
          </a-tab-pane>
          <a-tab-pane key="2" tab="Video trong Series">
            <a-button type="primary" style="margin-bottom: 8px" @click="handleAdd" class="float-right" ghost>Thêm</a-button>
            <a-table :dataSource="dataSource" :columns="columns" v-if="dataSource.length > 0">
              <template #bodyCell="{ column, record }">
                <template v-if="column.key === 'name'">
                  <a-button type="link" @click="handlePreview(record)">{{record.name}}</a-button>
                </template>
                <template v-else-if="column.key === 'action'">
                  <a-popconfirm
                    title="Bạn muốn xóa video ra khỏi series này?"
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
        <a-space align="center">
          <a-button type="primary" html-type="submit">Lưu</a-button>
          <a-button type="primary" ghost @click="back()">Trở về</a-button>
        </a-space>
      </a-form>
    </SectionMain>
  </LayoutAuthenticated>
  <a-modal v-model:open="isShowModal" width="70%" title="Danh sách video" :footer="null">
    <VideoList @submit="selectVideo"></VideoList>
  </a-modal>

  <a-modal :open="previewVisible" :title="previewTitle" :footer="null" @cancel="handleCancel">
    <video controls>
      <source :src="previewUrl">
    </video>
  </a-modal>
</template>

<style>
  .ant-input {
    border-color: #d9d9d9 !important;
    border-radius: 5px !important;
  }
</style>
