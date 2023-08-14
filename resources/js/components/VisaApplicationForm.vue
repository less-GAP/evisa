<script setup>
import {reactive, ref} from "vue";
import {message} from 'ant-design-vue';
import ApplicantForm from "./ApplicantForm.vue"
import {mdiAccountGroupOutline} from "@mdi/js";
import BaseIcon from "./BaseIcon.vue";
import Api from "../utils/Api";

const props = defineProps({
    value: Object
})

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
const current = ref(0)

const formState = reactive(props.value || {
    number_of_visa: 1,
    type_of_visa: 1,
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
const submitForm = async function () {
    loading.value = true
    Api.post('visa-application', {...formState, total_amount: calculateFee()}).then(result => {
        current.value = 2
    }).catch(e => {
    }).finally(loading.value = false)
}
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


    <div class="container p-50 text-center">
        <div class="sA1_w">
            <div class="s_h">
                <h1 class="text-4xl">Online Vietnamese e-Visa Application</h1>
            </div>
            <div class="bg-blue-100 " style="padding:50px">
                <a-steps
                    style="width:600px;margin:0 auto"
                    v-model:current="current"
                    status="success"
                    :items="[
      {
        title: 'Visa Options'
      },
      {
        title: 'Applicant Detail',
      },
      {
        title: 'Review & Payment',
      },
    ]"
                ></a-steps>
            </div>

        </div>
    </div>
    <div class="container bg1">
        <div class="fS">
            <a-form validateTrigger="submit" class="fS1" :label-col="{style: { width: '200px' } }" method="post"
                    novalidate="novalidate">
                <a-card>

                    <a-row v-show="current ==0" :gutter="50">
                        <a-col :span="16">
                            <a-form-item props="number_of_visa" :rules="[{ required: true }]"
                                         label="Number of applicants">
                                <a-input-number class="w-[200px] pl-5" :min="1" :max="5"
                                                v-model:value="formState.number_of_visa">
                                    <template #addonBefore>
                                        <div class="w-full h-full cursor-pointer hover:text-blue-500"
                                             @click.prevent="formState.number_of_visa>1?formState.number_of_visa-=1:''"
                                             :disabled="formState.number_of_visa<=1">-
                                        </div>
                                    </template>
                                    <template #addonAfter>
                                        <div type="icon" class="w-full h-full cursor-pointer hover:text-blue-500"
                                             @click.prevent="formState.number_of_visa<5?formState.number_of_visa+=1:''"
                                             :disabled="formState.number_of_visa>=5">+
                                        </div>
                                    </template>
                                    <template #prefix>
                                        <BaseIcon :path="mdiAccountGroupOutline"></BaseIcon>
                                    </template>

                                </a-input-number>
                            </a-form-item>
                            <a-divider></a-divider>
                            <a-form-item props="type_of_visa" :rules="[{ required: true }]" label="Type of visas">
                                <a-radio-group v-model:value="formState.type_of_visa">
                                    <a-radio :value="1">E-Visa (1 Month Single Entry)</a-radio>
                                </a-radio-group>
                            </a-form-item>

                            <a-divider></a-divider>

                            <a-form-item props="processing_time" :rules="[{ required: true }]"
                                         label="Processing Time">
                                <a-radio-group v-model:value="formState.processing_time">
                                    <a-radio class="w-full mb-3" :value="1">Standard processing (5-7 working days)
                                    </a-radio>
                                    <a-radio class="w-full mb-3" :value="2">Urgent 2 Working Days (Mon-Fri)</a-radio>
                                    <a-radio class="w-full mb-3" :value="3">Urgent 1 Working Day (Mon-Fri)</a-radio>
                                    <a-radio :value="4">Same Day (4-8 Working Hours)</a-radio>
                                </a-radio-group>
                            </a-form-item>
                            <a-form-item props="entry_port" :rules="[{ required: true }]" label="Intended entry ports">

                                <a-select show-search v-model:value="formState.entry_port" style="width: 300px"
                                          @change="handleChange">
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
                            </a-form-item>
                            <a-form-item props="date_arrival" :rules="[{ required: true }]" label="Date of Arrival">
                                <a-date-picker style="width: 300px" v-model:value="formState.date_arrival"
                                               :show-time="{ format: 'HH:mm' }"
                                               format="YYYY-MM-DD HH:mm"/>
                            </a-form-item>

                        </a-col>
                        <a-col :span="8">
                            <a-descriptions title="SUMMARY" :column="1" bordered>
                                <a-descriptions-item label="TOTAL E-VISA FEES:"><b>${{ calculateFee() }} US</b>
                                </a-descriptions-item>
                            </a-descriptions>
                            <button @click="current+=1" :disabled="!formState.date_arrival || !formState.entry_port"
                                    style="margin-top:50px" type="button"
                                    class="text-white disabled:!bg-blue-300 mt-50 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                Next Step
                            </button>
                            <div class="fS1_fe">(Current time in Vietnam: 15:10 PM - Monday - August 14, 2023)</div>
                        </a-col>
                    </a-row>
                    <a-row v-show="current ==1" :gutter="50">

                        <a-col :span="16">
                            <a-form-item prop="contact_name" label="Contact Name"
                                         :rules="[{ required: true }]">
                                <a-input v-model:value="formState.contact_name"/>
                            </a-form-item>
                            <a-form-item prop="contact_email"
                                         label="Contact Email"
                                         :rules="[{ required: true }]">
                                <a-input v-model:value="formState.contact_email"/>
                            </a-form-item>
                            <a-form-item prop="contact_phone"
                                         label="Contact Phone"
                                         :rules="[{ required: true }]">
                                <a-input v-model:value="formState.contact_phone"/>
                            </a-form-item>
                            <a-tabs v-model:activeKey="activeKey">
                                <a-tab-pane v-for="number of formState.number_of_visa" :key="number"
                                            :tab="'Applicant '+number">
                                    <ApplicantForm v-model:value="formState.applicants[number-1]"></ApplicantForm>
                                </a-tab-pane>

                            </a-tabs>

                        </a-col>
                        <a-col :span="8">
                            <a-descriptions title="SUMMARY" :column="1" bordered>
                                <a-descriptions-item label="TOTAL E-VISA FEES:"><b>${{ calculateFee() }} US</b>
                                </a-descriptions-item>
                            </a-descriptions>
                            <button @click="submitForm" :disabled="!formState.date_arrival || !formState.entry_port"
                                    style="margin-top:50px" type="button"
                                    class="text-white disabled:!bg-blue-400 mt-50 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                Next Step
                            </button>
                            <div class="fS1_fe">(Current time in Vietnam: 15:10 PM - Monday - August 14, 2023)</div>
                        </a-col>
                    </a-row>
                    <a-row v-show="current ==2" :gutter="50">
                        <a-result
                            style="margin:0 auto"
                            status="success"
                            title="Successfully!"
                            sub-title="Order number: 2017182818828182881 We will contact with you soon, please wait."
                        >

                        </a-result>

                    </a-row>
                </a-card>


            </a-form>
        </div>
    </div>

</template>
<style scoped>


.ant-input-number-group-addon {
    padding: 0 !important;
}
</style>
