<script setup>
  import {reactive, ref, h} from "vue";
  import {mdiBallotOutline, mdiAccount, mdiMail, mdiGithub, mdiDelete, mdiEye} from "@mdi/js";
  import SectionMain from "@/components/SectionMain.vue";
  import LayoutAuthenticated from "@/layouts/LayoutAuthenticated.vue";

  import {Modal, DataTable} from "@/components";
  import {DeleteOutlined, FormOutlined} from '@ant-design/icons-vue';

  import Api from "@/utils/Api";
  import router from "@/router";
  import {notification} from "ant-design-vue";

  const tableConfig = {
    api: (params) => Api.get('series/list', {params}),
    addAction: (reload) => {
      router.push('/series/0')
    },
    itemActions: [
      {
        label: '',
        class: 'font-medium text-blue-600 dark:text-blue-500 hover:underline',
        icon: mdiDelete,
        key: 'edit',
        action(item, reload) {
          router.push('/series/' + item.id)
        }
      },
      {
        label: '',
        class: 'font-medium text-red-600 dark:text-red-500 hover:underline',
        icon: mdiDelete,
        key: 'delete',
        action(item, reload) {
          Api.delete('series/' + item.id).then(rs => {
            notification[rs.data.code == 0 ? 'error' : 'success']({
              message: 'Thông báo',
              description: rs.data.message,
            });
          }).finally(() => {
            reload();
          });
        }
      }

    ],
    columns: [
      {title: 'Nhóm khách hàng', key: 'customer_group_name'},
      {title: 'Tên', key: 'name'},
      {title: 'Danh sách Video', key: 'video'},
      {title: 'Tình trạng', key: 'status'}
    ],
    selectionActions: [
      {
        title: 'Hoạt động',
        action(selectedKeys) {
          return Api.post('series/activeList', {
            'items': selectedKeys,
            'status': 'A'
          }).then(rs => {
            notification[rs.data.code == 0 ? 'error' : 'success']({
              message: 'Thông báo',
              description: rs.data.message,
            });
          })
        },
      },
      {
        title: 'Tắt',
        action(selectedKeys) {
          return Api.post('series/activeList', {
            'items': selectedKeys,
            'status': 'D'
          }).then(rs => {
            notification[rs.data.code == 0 ? 'error' : 'success']({
              message: 'Thông báo',
              description: rs.data.message,
            });
          })
        },
      },
    ]
  }

  const previewVisible = ref(false);
  const previewUrl = ref('');
  const previewTitle = ref('');


  const handleCancel = () => {
    previewVisible.value = false;
    previewTitle.value = '';
  };

  const handlePreview = (item) => {
    previewVisible.value = true;
    previewUrl.value = item.path_full;
    previewTitle.value = item.name;
  };

  const previewVisibleList = ref(false);
  const previewTitleList = ref('');

  const handlePreviewList = (item) => {
    previewVisibleList.value = true;
    previewTitleList.value = item.name;
    dataSource.value = item.videos;
  };

  const handleCancelList = () => {
    previewVisibleList.value = false;
    previewTitleList.value = '';
    dataSource.value = false;
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
      title: 'Chi tiết',
      key: 'action',
    },
  ]);


</script>

<template>
  <LayoutAuthenticated>
    <SectionMain>
      <DataTable v-bind="tableConfig">
        <template #cellAction[delete]="{item,actionMethod}">
          <a-popconfirm
            title="Bạn muốn xóa sản phẩm này?"
            ok-text="Yes"
            cancel-text="No"
            @confirm="actionMethod"
          >
            <a-button
              type="text"
              danger
              :icon="h(DeleteOutlined)"
              label=""
              :outline="true"
            >
            </a-button>
          </a-popconfirm>
        </template>
        <template #cellAction[edit]="{item,actionMethod}">
          <a-button
            type="text"
            :icon="h(FormOutlined)"
            label=""
            :outline="true"
            @click="actionMethod"
          >
          </a-button>
        </template>
        <template #cell[name]="{item,column}">
          {{item.name}}
        </template>
        <template #cell[video]="{item,column}">
          <a-button type="link" @click="handlePreviewList(item)">Xem chi tiết ({{item.videos.length}})</a-button>
        </template>
        <template #cell[status]="{item,column}">
          <div class="flex items-center" v-if="item.status == 'D'">
            <div class="h-2.5 w-2.5 rounded-full bg-red-500 mr-2"></div>
            Tắt
          </div>
          <div class="flex items-center" v-else>
            <div class="h-2.5 w-2.5 rounded-full bg-green-500 mr-2"></div>
            Hoạt động
          </div>
        </template>
      </DataTable>
    </SectionMain>
  </LayoutAuthenticated>
  <a-modal :open="previewVisibleList" :title="previewTitleList" :footer="null" @cancel="handleCancelList" width="50%">
    <a-table :dataSource="dataSource" :columns="columns" v-if="dataSource.length > 0">
      <template #bodyCell="{ column, record }">
        <template v-if="column.key === 'name'">
          {{record.name}}
        </template>
        <template v-else-if="column.key === 'action'">
          <a-button type="link" @click="handlePreview(record)">Chi tiết</a-button>
        </template>
      </template>
    </a-table>
  </a-modal>

  <a-modal :open="previewVisible" :title="previewTitle" :footer="null" @cancel="handleCancel">
    <video controls>
      <source :src="previewUrl">
    </video>
  </a-modal>
</template>
