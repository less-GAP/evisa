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

</script>

<template>

  <DataListEdit :columns="
[{
          title: 'Label',
          dataIndex: 'label'
        },{
          title: 'Value',
          dataIndex: 'value'
        },{
          title: 'Working hours',
          dataIndex: 'working_hours',
           props:{
            min:0,
          },
           type:'number'
        },
        {
          title: 'Fee per applicant (USD)',
          dataIndex: 'fee_per_applicant',
          props:{
            min:0,
            style:`width:'250px'`,
            prefix:'$'
          },
          type:'number'
        },
        {
          title: 'Status',
          dataIndex: 'status',
          props:{
            checkedValue:'active',
            unCheckedValue:'inactive',
          },
          type:'switch'
        }
        ]" v-model:value="formState.data">
    <template #action>
      <a-button @click="submit" class="float-right" type="primary">Save</a-button>
    </template>
  </DataListEdit>
  <a-drawer title="Draw edit" v-model:open="showExport" width="50vw">
    <a-form label-position="top" label-width="200px" >

    <a-form-item label="Key">

      <a-input :disabled="true" :value="formState.data_key"></a-input>
    </a-form-item>
    <a-form-item label="Data">
      <a-textarea rows="10" v-model:value="jsonEdit" v-if="showExport"></a-textarea>
    </a-form-item>
    <a-button class="mt-5" type="primary" @click="saveJson">Submit</a-button>
    </a-form>
  </a-drawer>
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
