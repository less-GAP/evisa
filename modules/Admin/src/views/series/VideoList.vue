<script setup>

  import {reactive, ref, h} from "vue";
  import Api from "@/utils/Api";
  import router from "@/router";
  import {mdiDelete} from "@mdi/js";

  import {DataTable} from "@/components";

  import {PlusOutlined, LoadingOutlined, DeleteOutlined, FormOutlined} from '@ant-design/icons-vue';

  const emit = defineEmits(['submit']);

  const tableConfig = {
    api: (params) => Api.get('video/list', {params:{...params}}),
    itemActions: [
      {
        label: 'Hành động',
        class: 'font-medium text-blue-600 dark:text-blue-500 hover:underline',
        icon: mdiDelete,
        key: 'edit',
        action(item, reload) {
          emit('submit',item);
        }
      },
    ],
    columns: [
      {title: 'Tên', key: 'name'},
      {title: 'Tình trạng', key: 'status'},
    ],
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
  <DataTable v-bind="tableConfig">
    <template #cellAction[edit]="{item,actionMethod}">
      <a-button
        type="link"
        :outline="true"
        @click="actionMethod"
      >Chọn
      </a-button>
    </template>
    <template #cell[name]="{item,column}">
      <a-button type="link" @click="handlePreview(item)">{{item.name}}</a-button>
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
  <a-modal :open="previewVisible" :title="previewTitle" :footer="null" @cancel="handleCancel">
    <video controls >
      <source :src="previewUrl">
    </video>
  </a-modal>
</template>
