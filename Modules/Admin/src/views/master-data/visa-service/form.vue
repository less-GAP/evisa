<script lang="ts" setup>
import {reactive, h, ref, toRaw, computed} from "vue";
import {CloseCircleOutlined, ArrowLeftOutlined} from '@ant-design/icons-vue';
import router from "@/router";
import {UseEloquentRouter} from "@/utils/UseEloquentRouter";
import ApiData from "@/components/ApiData.vue";
import Api from "@/utils/Api";
import DataListEdit from "@/components/DataListEdit.vue";

const prefix = 'visa-service'
const {
  fetchDetailApi,
  createApi,
  // updateApi
} = UseEloquentRouter(prefix)

const loading = ref(false);

const formRef = ref();


const emit = defineEmits(["close"]);
const formState = reactive({
  name: '',
  status: 'active',
  price_config: {},
  processing_time_pricing: {},
});

const fetch = async function () {
  loading.value = true;
  var id = router.currentRoute.value.params.id;
  if (id !== 'new') {
    loading.value = true
    const value = await fetchDetailApi(id)
    Object.assign(formState, value.data)
    loading.value = false
  } else {
    loading.value = false
  }
}
fetch();


const submit = () => {
  formRef.value
    .validate()
    .then(() => {
      createApi({...formState}).then(rs => {
        Object.assign(formState, rs.data.result)
      });
    })
};
const closeDetail = function () {
  router.replace({path: '/master-data/visa-service'})
}

const showExport = ref(false)
const jsonEdit = ref('')


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

Api.get('/visa-customer-level/all').then(rs => {
  const data = rs.data;
  for (const visaType of data) {
    columns.value.push({
      title: visaType.name,
      dataIndex: 'price_' + visaType.id,
      width: 250,
      props: {
        min: 0,
        style: `width:'250px'`,
        prefix: '$'
      },
      type: 'number'
    })
  }
  columns.value.push({
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
  <a-drawer body-style="padding:0" :closable="false"
            style="position:relative;display:flex;flex-direction:column;height:100vh;"
            @close="closeDetail" :open="true" width="100vw">
    <a-form class="w-full h-full bg-gray-100 !p-5 " layout="vertical" v-bind="$config.formConfig" ref="formRef"
            :model="formState"
            @finish="submit">
      <a-card body-style="padding:10px;height:55px;"
              class="bg-gray-50  ">
        <a-button class="float-left" type="link" @click="closeDetail">
          <template #icon>
            <ArrowLeftOutlined/>
          </template>
        </a-button>
        <a-space class="float-right" align="right">
          <!--                <a-button v-if="formState.rule_detect_category_link" @click="detectCategory" :loading="loadingDraft" >Test Category</a-button>-->
          <a-button v-if="!formState.id" @click="submit()" :loading="loading" type="primary">Create</a-button>
          <a-button v-else @click="submit()" :loading="loading" type="primary" class="!bg-yellow-400">Update</a-button>
        </a-space>
      </a-card>
      <div style="height:calc(100% - 70px);margin-top:15px;overflow: auto;padding:0;" :gutter="20">
        <a-card title="Visa Service">
          <div class="lg:w-1/5 inline">

            <a-form-item class="  w-full" label="Name"
                         name="name"
                         :rules="[{ required: true }]"
            >
              <a-input v-model:value="formState.name" placeholder="Title.."/>
            </a-form-item>
            <a-form-item class="w-full" label="Status"
                         name="status"
                         :rules="[{ required: true }]"
            >
              <a-switch checkedValue="active" unCheckedValue="inactive" v-model:checked="formState.status"/>
            </a-form-item>
          </div>

          <div class="lg:w-4/5  inline" label="Description"
               name="description"
          >
            <HtmlEditor v-model:value="formState.description"/>
          </div>


        </a-card>
        <a-card class="!mt-5" title="Pricing Config For Customer Level">
          <ApiData url="/visa-customer-level/all" v-slot="{data}">
            <a-form-item class="w-1/2 inline-flex" :rules="[{ required: true }]" :label="level.name"
                         v-for="level in data">
              <a-input-number style="width: 200px" :min="1"
                              v-model:value="formState.price_config[level.id]"></a-input-number>
            </a-form-item>
          </ApiData>


        </a-card>

      </div>

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

.ant-form-item {
  margin-bottom: 0;
}
</style>
