<script lang="ts" setup>
import {reactive, h, ref, toRaw} from "vue";
import {useMainStore} from "@/stores/main";
import {
  mdiAccount,
  mdiMail,
  mdiAsterisk,
  mdiFormTextboxPassword,
  mdiGithub,
} from "@mdi/js";

import {PlusOutlined, LoadingOutlined, DeleteOutlined} from '@ant-design/icons-vue';

import router from "@/router";

import {UseEloquentRouter} from "@/utils/UseEloquentRouter";
import DataListEdit from "@/components/DataListEdit.vue";
import {Switch} from "ant-design-vue";
import Api from "@/utils/Api";
import LayoutAuthenticated from "@/layouts/LayoutAuthenticated.vue";

const prefix = 'master-data'
const listKey = ref(router.currentRoute.value.params.id)
const {
  fetchListApi,
  createApi,
  fetchDetailApi,
  deleteApi,
  updateApi
} = UseEloquentRouter(prefix)

const mainStore = useMainStore();

const loading = ref(false);
const showPicker = ref(false);

const activeKey = ref('1');

const formRef = ref();
const onSelectImage = function () {
};
const props = defineProps({
  value: {
    type: Object,
    default: {}
  }, visible: {
    type: Boolean,
    default: true
  },
})
const emit = defineEmits(["close"]);
const formState = reactive({
  data_key: listKey.value,
  data: [{}]
});
const isShowModal = ref(false)

const fetch = async function () {
  loading.value = true;
  loading.value = true
  const value = await fetchDetailApi(listKey.value)
  if (value.data) {
    Object.assign(formState, value.data)
  }
  loading.value = false

}
fetch();

const submit = (status) => {

  createApi({...formState, status: status}).then(rs => {
    Object.assign(formState, rs.data.result)
  });

};

const closeDetail = function () {
  props.visible = false;
  emit('close');
}

const showExport = ref(false)
const jsonEdit = ref('')

const showEdit = function () {
  jsonEdit.value = JSON.stringify(formState.data)
  showExport.value = true
}
const saveJson = function () {
  formState.data = JSON.parse(jsonEdit.value)
  showExport.value = false
}
const columns = ref([
  {
    title: 'Label',
    width: 350,
    dataIndex: 'label'
  }, {
    title: 'Url',
    width: 350,
    dataIndex: 'url'
  },


])
let timeOptions = [];
const MIN = 8, MAX = 19


</script>

<template>
  <LayoutAuthenticated>
    <h1 v-if="listKey=='site-menu'">Main menu</h1>
    <h1 v-if="listKey=='footer-menu'">Footer menu</h1>
    <a-divider></a-divider>
    <DataListEdit :nested="1" :columns="columns" v-model:value="formState.data">
      <template #action>
        <a-button @click="submit" class="float-right" type="primary">Save</a-button>
      </template>
      <template #cell[cut_off]="{item}">
        <a-select
          v-model:value="item.cut_off"
          mode="multiple"
          style="width: 100%"
          placeholder="Please select"
          :options="timeOptions"
          @change="handleChange"
        ></a-select>
      </template>
    </DataListEdit>
  </LayoutAuthenticated>
</template>

<style>
.ant-input {
  border-color: #d9d9d9 !important;
  border-radius: 5px !important;
}

.ant-modal-wrap {
  z-index: 100001 !important;
}
</style>
