<script setup>
import {computed, ref, h, toRaw} from "vue";
import {useMainStore} from "@/stores/main";
import {mdiEye, mdiTrashCan} from "@mdi/js";
import {Button, Input} from "@/components";
import BaseIcon from "@/components/BaseIcon.vue";
import FileViewDetail from "./FileViewDetail.vue";
import {DownOutlined, FileOutlined, FolderOpenOutlined, ReloadOutlined, UploadOutlined} from "@ant-design/icons-vue";
import Api from "@/utils/Api";

const emit = defineEmits(["close", "select"]);

const props = defineProps({
  config: {
    type: Object,
    default: {
      item_key: 'id'
      , rowSelect: true
    }
  },
  pagination: {
    type: Object,
    default: {
      page: 1,
      total: 0,
      perPage: 24
    }
  },
  showSizeChanger: {
    type: Boolean,
    default: true
  },
  params: {
    type: Object,
    default: {}
  },
  columns: Array,
  selectionActions: {
    type: Array,
    default: []
  },
  itemActions: {
    type: Array,
    default: []
  },
  addAction: Function,
});
const tableConfig = {
  item_key: 'id'
  , rowSelect: true
  , globalSearch: true
  , ...props.config
}
const tableData = ref({})
const inProgressFiles = ref([])
const search = ref('')

function reset() {
  props.pagination.page = 1
  reload()
}

function reload() {
  loading.value = true
  Api.get('file/list', {
    params: {
      perPage: props.pagination.perPage,
      page: props.pagination.page, ...props.params,
      "filter[search]": search.value
    }
  }).then(rs => {
    tableData.value = rs.data
    props.pagination.total = rs.data?.total ? rs.data.total : 0
  }).finally(() => {
    checkAll.value = false
    loading.value = false
  })
}

const loading = ref(false);
const checkAll = ref(false);
const fileDetail = ref(null);
const selectedKeys = ref([])
const selectedItems = ref([])

async function doSelectionAction(action) {
  const selectedKeys = selectedItems.value.map(item => item[tableConfig.item_key])
  await (action.action(selectedKeys, selectedItems.value))
  if (action.complete) {
    action.complete()
  }
  selectedItems.value = []
  reload()
}

function toggleCheckAll() {
  if (checkAll.value) {
    selectedItems.value = toRaw(tableData?.value.data || [])
  } else {
    selectedItem.value = []
  }
}

async function upload() {
  if (!inProgressFiles.value.length) {
    return;
  }
  const index = inProgressFiles.value.length - 1;
  const option = inProgressFiles.value[index]
  let formData = new FormData();
  formData.append("file", option.file);
  // formData.append("dir", props.dir);
  const res = await Api.post('file/Upload', formData, {
    headers: {
      'Content-Type': 'multipart/form-data'
    },
    onUploadProgress: function (progressEvent) {
      inProgressFiles.value[index].percent = Math.round((progressEvent.loaded * 100) / progressEvent.total);
    },
  })
  if (!tableData.value.data) {
    tableData.value.data = []
  }
  inProgressFiles.value.splice(index, 1)
  tableData.value.data.unshift(res.data);
  await upload()
}

async function onFilesSelect(option) {
  option.percent = 0
  inProgressFiles.value.push(option)
  await upload()
  // inProgressFiles.value.forEach(upload)
}

function isImageUrl(url) {
  return /\.(jpg|jpeg|png|webp|avif|gif|svg)$/.test(url);
}

function close() {
  emit('close')
}

function selectFile(file) {
  emit('select', file)
}

reload()
</script>

<template>
  <a-row :gutter="20">
    <a-col :span="18">
      <div class="relative text-center overflow-x-auto sm:rounded-lg">

        <div :loading="loading" class="flex items-center justify-between  bg-white dark:bg-gray-800">
          <a-space>

            <a-input
              v-if="tableConfig.globalSearch"
              allow-clear
              @keyup.enter="reload"
              style="max-width: 300px"
              v-model:value="search"
              placeholder="Enter to search..."
              :loading="loading"
            />
            <a-upload
              name="file"
              :showUploadList="false"
              :max-count="10"
              multiple="true"
              :customRequest="onFilesSelect"
            >
              <a-button>
                <upload-outlined></upload-outlined>
                Click to Upload
              </a-button>
            </a-upload>
            <a-upload :showUploadList="false" :customRequest="onFilesSelect" directory>
              <a-button>
                <FolderOpenOutlined></FolderOpenOutlined>
                Upload Directory
              </a-button>
            </a-upload>
          </a-space>
          <span>

      </span>

          <a-space>
            <a-button>
              <template #icon>
                <reload-outlined @click="reload"/>
              </template>
            </a-button>
            <a-dropdown v-if="selectionActions.length > 0" :disabled="!selectedItems.length">
              <template #overlay>
                <a-menu>
                  <a-menu-item @click="doSelectionAction(action)" :key="index"
                               v-for="(action,index) in selectionActions"
                  >
                    {{ action.title }}
                  </a-menu-item>

                </a-menu>
              </template>
              <a-button>
                Hành động
                <DownOutlined/>
              </a-button>
            </a-dropdown>

            <a-button type="primary" v-if="addAction" @click="()=>{addAction(reload)}">Thêm mới</a-button>

          </a-space>
        </div>
        <div style="max-height:60vh;overflow:auto" class="mt-12 mb-12 grid grid-cols-3 lg:grid-cols-4  gap-4">
          <div v-for="file in inProgressFiles"
               class="cursor-pointer border-2 border-gray-100  hover:border-blue-700  h-[150px] mb-5  rounded-lg overflow:hidden">
            <a-progress type="circle" :percent="file.percent"/>
          </div>
          <div
            v-class="fileDetail && fileDetail.id == image.id?'!border-blue-700':''"
            @click="fileDetail = image" v-for="image in tableData.data" :key="image.id"
            class=" cursor-pointer relative border-2 border-gray-100 hover:border-blue-700 h-[150px]  mb-[50px] rounded-lg overflow:hidden">
            <img
              v-if="isImageUrl(image.file_url)"
              style="max-width:auto;max-height:auto"
              :title="image.file_name"
              class="h-full object-contain object-center w-full max-w-full "
              :src="image.file_url"
            />
            <div
              v-else
              :title="image.file_name"
              class="h-full flex items-center text-center object-contain object-center w-full max-w-full "
            >
              <file-outlined style="margin:0 auto;font-size: 30px"/>
            </div>
            <div
              class="absolute whitespace-nowrap text-center overflow-hidden text-ellipsis -bottom-[40px] bg-white w-full pl-2 pr-2 ">
              {{ image.file_name }}
            </div>
          </div>
        </div>
        <!--     <a-empty v-else/>-->
        <br>
        <a-pagination v-if="pagination?.total" :showSizeChanger="showSizeChanger" @change="reload"
                      v-model:current="pagination.page"
                      v-model:pageSize="pagination.perPage" :total="pagination.total">
          <template #itemRender="{ type, originalElement }">
            <a v-if="type === 'prev'">Previous</a>
            <a v-else-if="type === 'next'">Next</a>
            <component :is="originalElement" v-else></component>
          </template>
        </a-pagination>
      </div>
    </a-col>
    <a-col v-if="fileDetail" :span="6">
      <FileViewDetail :value="fileDetail"></FileViewDetail>
      <a-divider></a-divider>
      <a-space class="text-center w-full flex items-center">
        <a-button @click="selectFile(fileDetail)" type="primary" :disabled="!fileDetail">Select this file</a-button>
        <a-button @click="close">Cancel</a-button>
      </a-space>
    </a-col>
  </a-row>
</template>
<style scoped>
.item-actions > :not(:first-child) {
  margin-left: 10px
}
</style>
