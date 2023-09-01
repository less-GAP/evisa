<script lang="ts" setup>
import {reactive, h, ref, toRaw, computed} from "vue";
import {CloseCircleOutlined, ArrowLeftOutlined} from '@ant-design/icons-vue';
import router from "@/router";
import {UseEloquentRouter} from "@/utils/UseEloquentRouter";
import ApiData from "@/components/ApiData.vue";

const prefix = 'agency-level'
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
  min_success_visa_per_month: 40,
  processing_time_pricing: {},
  expire_days: 30
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
  router.replace({path: '/master-data/agency-level'})
}

</script>

<template>
  <a-drawer :closable="false" style="position:relative;display:flex;flex-direction:column;height:100vh;"
            @close="closeDetail" :open="true" width="80vw">
    <a-form class="w-full" layout="vertical" v-bind="$config.formConfig" ref="formRef" :model="formState"
            @finish="submit">
      <div style="height:50px;"
           class=" ">
        <a-button class="float-left" type="link" @click="closeDetail">
          <template #icon>
            <ArrowLeftOutlined/>
          </template>
        </a-button>
        <a-space class="float-right" align="right">
          <!--                <a-button v-if="formState.rule_detect_category_link" @click="detectCategory" :loading="loadingDraft" >Test Category</a-button>-->
          <a-button @click="submit()" :loading="loading" type="primary">Save</a-button>
        </a-space>
      </div>
      <a-row class="w-full" :gutter="20">
        <a-col :lg="12" :span="24">
          <a-card title="Information">
            <a-form-item label="Name"
                         name="name"
                         :rules="[{ required: true }]"
            >
              <a-input v-model:value="formState.name" placeholder="Title.."/>
            </a-form-item>
            <a-form-item label="Minimum Success Visa Per Month"
                         name="min_success_visa_per_month"
                         :rules="[{ required: true }]"
            >
              <a-input-number v-model:value="formState.min_success_visa_per_month"/>
            </a-form-item>
            <a-form-item label="Expired Days"
                         name="expire_days"
                         :rules="[{ required: true }]"
            >
              <a-input-number v-model:value="formState.expire_days"/>
            </a-form-item>
            <a-form-item label="Status"
                         name="status"
                         :rules="[{ required: true }]"
            >
              <a-switch checkedValue="active" unCheckedValue="inactive" v-model:checked="formState.status"/>
            </a-form-item>
          </a-card>
        </a-col>
        <a-col :lg="12" :span="24">
          <a-card title="Pricing Config">
            <ApiData url="master-data/visa-processing-time/data">
              <template #default="{data}">
                <a-form-item v-for="option in data"
                             :name="['processing_time_pricing',option.value]"
                             :rules="[{ required: true }]"
                >
                  <template #label>
                    {{option.label}} <b> &nbsp;(${{option.fee_per_applicant}})</b>
                  </template>
                    <a-input-number :min="0" style="min-width:200px"
                                    v-model:value="formState.processing_time_pricing[option.value]"/>
                </a-form-item>
              </template>
            </ApiData>
          </a-card>
        </a-col>
      </a-row>

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
