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

const prefix = 'master-data'
const listKey = 'visa-processing-time'
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
  data_key: listKey,
  data: [{}]
});
const isShowModal = ref(false)

const fetch = async function () {
  loading.value = true;
  loading.value = true
  const value = await fetchDetailApi(listKey)
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
    title: 'Status',
    dataIndex: 'status',
    props: {
      checkedValue: 'active',
      unCheckedValue: 'inactive',
    },
    type: 'switch'
  },
  {
    title: 'Contact Admin',
    dataIndex: 'contact_admin',
    props: {
      checkedValue: true,
      unCheckedValue: false,
    },
    type: 'switch'
  },
  {
    title: 'Label',
    width: 350,
    dataIndex: 'label'
  }, {
    title: 'Value',
    width: 70,
    dataIndex: 'value'
  }, {
    title: 'Working hours',
    dataIndex: 'working_hours',
    width: 100,
    props: {
      min: 0,
    },
    type: 'number'
  },
  {
    title: 'CUT OFF',
    dataIndex: 'cut_off',
    width: 200,
    props: {
      min: 0,
    }
  }

])
Api.get('master-data/type-of-visa').then(rs => {
  const data = rs.data.data;
  for (const visaType of data) {
    columns.value.push({
      title: visaType.label,
      dataIndex: 'price_' + visaType.value,
      width: 250,
      props: {
        min: 0,
        style: `width:'250px'`,
        prefix: '$'
      },
      type: 'number'
    })
  }
  columns.value.push( {
    title: 'Note',
    dataIndex: 'not',
    width: 300,
  })
})
let timeOptions = [];
const MIN = 8, MAX = 19
Array.from({length: MAX - MIN + 1}, (v, k) => k + MIN).forEach(item => {
  let string = item;
  if (item < 10) {
    string = '0' + item
  }
  timeOptions.push({
    value: string + ':00',
    label: string + ':00'
  })
  timeOptions.push({
    value: string + ':30',
    label: string + ':30'
  })
})

</script>

<template>
  <DataListEdit :columns="columns" v-model:value="formState.data">
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
