<script setup>
import {reactive, ref} from "vue";
import Api from "@/utils/Api";
import LayoutAuthenticated from "@/layouts/LayoutAuthenticated.vue";
import {message} from 'ant-design-vue';
import ApplicantForm from "./ApplicantForm.vue"
import {mdiAccountGroupOutline} from "@mdi/js";
import {BaseIcon, RemoteSelect} from "@/components";
import router from "@/router";
import {ProcessingTimes} from "@/views/visa-applications/meta";

const id = router.currentRoute.value.params.id
const value = ref({})
const validateMessages = {
  required: '${label} is required!',
  types: {
    email: '${label} is not a valid email!',
    number: '${label} is not a valid number!',
  },
  number: {
    range: '${label} must be between ${min} and ${max}',
  },
};

const emit = defineEmits(["success", "cancel"]);
const loading = ref(false)
const error = ref(null)
const formState = reactive({
  number_of_visa: 1,
  type_of_visa: 1,
  assigned_users: [],
  processing_time: 1,
  applicants: [{}, {}, {}, {}, {}],

});

const formConfig = reactive({
  "validateTrigger": "submit",
  "label-align": "top",
  "model": formState,
  labelCol: {span: 24},
  wrapperCol: {span: 24},
  "validate-messages": validateMessages,
});

const addStatus = async function (status) {
  loading.value = true
  Api.post('visa-application/status', {...formState, id: id, status: status}).then(result => {
    fetch()
  }).catch(e => {
  }).finally(loading.value = false)
}
const submitAssignees = async function () {
  loading.value = true
  Api.post('visa-application/assign', {
    ...formState,
    id: id,
    assignees: formState.assigned_users
  }).then(result => {
    fetch()
  }).catch(e => {
  }).finally(loading.value = false)
}
const fetch = async function () {
  loading.value = true
  Api.get('visa-application/' + id).then(result => {
    value.value = result.data
  }).catch(e => {
  }).finally(loading.value = false)
}
fetch()
const cancel = function () {
  emit('cancel')
}
const visaProcessingTypeFeePerPerson = {
  1: 75
  , 2: 95
  , 3: 125
  , 4: 180
}

function calculateFee() {
  return visaProcessingTypeFeePerPerson[formState.processing_time] * formState.number_of_visa
}

</script>

<template>
  <a-drawer @close="$router.back()" :open="true" width="90vw">
    <a-card v-if="value" class="w-full relative">

      <a-tabs v-if="value.applicants && value.applicants.length">
        <a-tab-pane key="information" :tab="'Information'">
          <a-descriptions>
            <a-descriptions-item label="Total amount"><b>{{ $format.formatNumber(value.total_amount) }} $</b>
            </a-descriptions-item>
            <a-descriptions-item label="Number of applicants"><b>{{ value.number_of_visa }}</b></a-descriptions-item>
            <a-descriptions-item label="Type of visas"><b>E-Visa (1 Month Single Entry)</b></a-descriptions-item>
            <a-descriptions-item label="Processing Time"><b>
              <RemoteSelect url="master-data/visa-processing-time/data" :disabled="true" :value="value.processing_time"></RemoteSelect>
            </b>
            </a-descriptions-item>
            <a-descriptions-item label="Intended entry ports"><b>
              <a-select class="w-full  border-0 rounded-none cursor-pointer" :disabled="true"
                        v-model:value="value.entry_port" style="width: 300px"
              >
                <a-select-opt-group>
                  <template #label>
                    <b class="text-blue text-lg">
                      International Airports
                    </b>
                  </template>
                  <a-select-option value="1">Noi Bai Int Airport (Ha Noi)</a-select-option>
                  <a-select-option value="2">Cat Bi Int Airport (Hai Phong)</a-select-option>
                  <a-select-option value="3">Cam Ranh Int Airport (Khanh Hoa)</a-select-option>
                  <a-select-option value="4">Can Tho International Airport</a-select-option>
                  <a-select-option value="5">Da Nang International Airport</a-select-option>
                  <a-select-option value="6">Phu Bai Int Airport</a-select-option>
                  <a-select-option value="7">Phu Quoc International Airport</a-select-option>
                  <a-select-option value="8">Tan Son Nhat Int Airport (Ho Chi Minh City)
                  </a-select-option>
                </a-select-opt-group>
                <a-select-opt-group>
                  <template #label>
                    <b class="text-blue text-lg">
                      Landports
                    </b>
                  </template>
                  <a-select-option value="9">Bo Y Landport</a-select-option>
                  <a-select-option value="10">Cha Lo Landport</a-select-option>
                  <a-select-option value="11">Cau Treo Landport</a-select-option>
                  <a-select-option value="12">Huu Nghi Landport</a-select-option>
                  <a-select-option value="13">Ha Tien Landport</a-select-option>
                  <a-select-option value="14">Lao Bao Landport</a-select-option>
                  <a-select-option value="15">Lao Cai Landport</a-select-option>
                  <a-select-option value="16">La Lay Landport</a-select-option>
                  <a-select-option value="17">Moc Bai Landport</a-select-option>
                  <a-select-option value="18">Mong Cai Landport</a-select-option>
                  <a-select-option value="19">Nam Can Landport</a-select-option>
                  <a-select-option value="20">Na Meo Landport</a-select-option>
                  <a-select-option value="21">Song Tien Landport</a-select-option>
                  <a-select-option value="22">Tinh Bien Landport</a-select-option>
                  <a-select-option value="23">Tay Trang Landport</a-select-option>
                  <a-select-option value="24">Xa Mat Landport</a-select-option>
                </a-select-opt-group>
              </a-select>
            </b>
            </a-descriptions-item>
            <a-descriptions-item label="Date of Arrival">
              <b>{{ $format.formatDateTime(value.date_arrival) }}</b>
            </a-descriptions-item>
            <a-descriptions-item label="Contact Name">
              <b>{{ value.contact_name }}</b>
            </a-descriptions-item>
            <a-descriptions-item label="Contact Email">
              <b>{{ value.contact_email }}</b>
            </a-descriptions-item>
            <a-descriptions-item label="Contact Phone">
              <b>{{ value.contact_phone }}</b>
            </a-descriptions-item>
            <a-descriptions-item label="Payment Status">
              <a-tag v-if="value?.payment_status == 'done'" color="green">Success</a-tag>
              <span v-else class="bg-yellow-100 text-ellipsis text-yellow-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-yellow-300 border border-yellow-300">Waiting for payment</span>
            </a-descriptions-item>

            <a-descriptions-item label="Agency">
              <b>{{value?.user?.full_name}}</b>
            </a-descriptions-item>
          </a-descriptions>
        </a-tab-pane>
        <a-tab-pane v-for="number of value.number_of_visa" :key="number" :tab="'Applicant '+number">
          <a-row :gutter="20">
            <a-col :span="8">
              <a-image-preview-group style="gap:10px">
                <a-image style="object-fit:contain;margin-right:10px;" width="153px" height="230px"
                         :src="$url(value.applicants[number-1].profile_photo)"></a-image>
                <a-image style="object-fit:contain" width="346px" height="230px"
                         :src="$url(value.applicants[number-1].passport_photo)"></a-image>
              </a-image-preview-group>
            </a-col>
            <a-col :span="16">
              <a-descriptions :column="2">
                <a-descriptions-item label="Full name as in passport"><b>{{
                    value.applicants[number - 1].full_name
                  }}</b>
                </a-descriptions-item>
                <a-descriptions-item label="Nationality"><b>{{ value.applicants[number - 1].nationality }} </b>
                </a-descriptions-item>
                <a-descriptions-item label="Passport number"><b>{{ value.applicants[number - 1].passport_number }} </b>
                </a-descriptions-item>
                <a-descriptions-item label="Email"><b>{{ value.applicants[number - 1].email }} </b>
                </a-descriptions-item>
              </a-descriptions>
            </a-col>
          </a-row>


        </a-tab-pane>

      </a-tabs>

    </a-card>
    <a-card  class="!mt-5">
<!--      <a-input-group v-if="!value?.assigned_users?.length " class="w-full" compact>-->
<!--        <a-form-item style="width: 600px" label="Please select assignees">-->
<!--          <RemoteSelect v-if="formState.assigned_users" mode="multiple"-->
<!--                        url="user/options"-->
<!--                        valueKey="username"-->
<!--                        labelKey="full_name"-->
<!--                        style="width: 100%"-->
<!--                        placeholder="Please select" v-model:value="formState.assigned_users">-->
<!--            <template #option="{option}">-->
<!--              <img class="h-[15px]  inline-flex border-2 border-white rounded-full dark:border-gray-800"-->
<!--                   :src="option.profile_photo_url" alt=""> {{ option.full_name }}-->
<!--            </template>-->
<!--          </RemoteSelect>-->
<!--        </a-form-item>-->
<!--        <a-button @click="submitAssignees" style="margin-left:-10px" type="primary" success>Save</a-button>-->
<!--      </a-input-group>-->

      <a-row  :gutter="20">
        <a-col v-if="value.status == 'pending-preview'" :span="12">
          <a-space>
            <a-button @click="addStatus('approved')" type="primary">Approve</a-button>
            <a-button @click="addStatus('rejected')" type="primary" danger>Reject</a-button>
          </a-space>
<!--          <a-form-item style="width: 600px" label="Assignees">-->
<!--            <RemoteSelect :disabled="true" mode="multiple"-->
<!--                          url="user/options"-->
<!--                          valueKey="username"-->
<!--                          labelKey="full_name"-->
<!--                          style="width: 100%"-->
<!--                          placeholder="Please select" :value="value.assigned_users">-->
<!--              <template #option="{option}">-->
<!--                <img class="h-[15px]  inline-flex border-2 border-white rounded-full dark:border-gray-800"-->
<!--                     :src="option.profile_photo_url" alt=""> {{ option.full_name }}-->
<!--              </template>-->
<!--            </RemoteSelect>-->
<!--          </a-form-item>-->

<!--          <a-form v-if="!value.approval_status || value.approval_status == 'pending'" :model="formState">-->

<!--            <a-form-item label="Comment">-->
<!--              <a-textarea v-model:value="formState.comment">-->

<!--              </a-textarea>-->
<!--            </a-form-item>-->
<!--            <a-form-item :wrapper-col="{ offset: 2, span: 16 }">-->
<!--              <a-space>-->
<!--                <a-button @click="addStatus('approved')" type="primary">Approve</a-button>-->
<!--                <a-button @click="addStatus('rejected')" type="primary" danger>Reject</a-button>-->
<!--              </a-space>-->
<!--            </a-form-item>-->
<!--          </a-form>-->
        </a-col>
        <a-col :span="12">
          <ol v-if="value?.history?.length" class="relative ml-12 border-gray-200 dark:border-gray-700">
            <li v-for="history in value.history" class="mb-10 ml-6">
              <div
                v-if="history.type == 'assign' "
                class="items-center justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:flex dark:bg-gray-700 dark:border-gray-600">
                <time class="mb-1 text-xs font-normal text-gray-400 sm:order-last sm:mb-0">
                  {{ $format.formatDateTime(history.created_at) }}
                </time>
                <div class="text-sm font-normal text-gray-500 dark:text-gray-300"><b>{{ history.user }}</b> assign to <b
                  class="bg-gray-100 text-gray-800 text-xs font-normal mr-2 px-2.5 py-0.5 rounded dark:bg-gray-600 dark:text-gray-300">{{
                    history.data.join(', ')
                  }}</b>
                </div>
              </div>
              <div
                v-if="history.type == 'approval' "
                class="items-center justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:flex dark:bg-gray-700 dark:border-gray-600">
                <time class="mb-1 text-xs font-normal text-gray-400 sm:order-last sm:mb-0">
                  {{ $format.formatDateTime(history.created_at) }}
                </time>
                <div class="text-sm font-normal text-gray-500 dark:text-gray-300"><b>{{ history.user }}</b>
                  <a-tag :color="history.status=='approved'?'success':'danger'">{{ history.status }}</a-tag>
                  <b
                    class="bg-gray-100 text-gray-800 text-xs font-normal mr-2 px-2.5 py-0.5 rounded dark:bg-gray-600 dark:text-gray-300">{{
                      history.comment
                    }}</b>
                </div>
              </div>
            </li>
          </ol>
        </a-col>
      </a-row>


    </a-card>
  </a-drawer>
</template>
<style scoped>


.ant-input-number-group-addon {
  padding: 0 !important;
}
</style>
