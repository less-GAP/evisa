<script setup>
import {reactive, ref} from "vue";
import {message} from 'ant-design-vue';
import ApplicantForm from "./ApplicantForm.vue"
import {mdiAccountGroupOutline} from "@mdi/js";
import BaseIcon from "./BaseIcon.vue";
import ApiData from "./ApiData.vue";
import Api from "../utils/Api";
import dayjs from "../utils/Dayjs";

const props = defineProps({
    value: Object
})

const validateMessages = {
    required: 'Please input!',
    types: {
        email: '${label} is not a valid email!',
        number: '${label} is not a valid number!',
    },
    number: {
        range: '${label} must be between ${min} and ${max}',
    },
};

const emit = defineEmits(["success", "cancel"]);
const form = ref()
const typeVisaList = ref([])
const typeProcessingList = ref([])
const loading = ref(false)
const error = ref(null)
const current = ref(0)
const tz = 'Asia/Ho_Chi_Minh'
const guessTz = dayjs.tz.guess()
const today = ref(dayjs().tz(tz))
setInterval(() => {
    today.value = dayjs().tz(tz)
}, 5000)
const formState = reactive(props.value || {
    number_of_visa: 1,
    type_of_visa: "1",
    processing_time: "2",
    applicants: [{}, {}, {}, {}, {}],

});

const formConfig = reactive({
    "validateTrigger": ["submit", "update:value"],
    "label-align": "top",
    "model": formState,
    labelCol: {span: 24},
    wrapperCol: {span: 24},
    "validate-messages": validateMessages,
});
const submitForm = async function () {
    try {
        await form.value
            .validate()
        loading.value = true
        Api.post('visa-application', {...formState, total_amount: calculateFee()}).then(result => {
            // current.value = 2
            window.location.href = '/checkout'
        }).catch(e => {
        }).finally(loading.value = false)
    } catch (e) {

    }
}
const nextStep = async function () {
    try {
        await form.value
            .validate()
        current.value = current.value + 1
    } catch (e) {

    }
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
    if (!getSelectedProcessingTime()) {
        return 0
    }
    return getSelectedProcessingTime()['price_' + formState.type_of_visa] * formState.number_of_visa
}

function getSelectedProcessingTime() {
    return typeProcessingList.value.find(item => item.value == formState.processing_time)
}

function calculateDueDate() {
    const procesingTime = getSelectedProcessingTime();
    if (!procesingTime && !Array.isArray(procesingTime.cut_off)) {
        return;
    }
    console.log(procesingTime.cut_off);
    let dueDate = dayjs().tz(tz).addBusinessHours(procesingTime.working_hours);
    for (let cutoff of procesingTime.cut_off) {
        if (dueDate.format('HH:MM') < cutoff) {
            const cutoffData = cutoff.split(':')
            formState.due_date = dueDate.set('hour', cutoffData[0]).set('minute', cutoffData[1])
            return
        }
        formState.due_date = dueDate.set('hour', 18).set('minute', 30)

    }


}

function getDueDateDiffHuman() {
    const diff = formState.due_date?.diff(today.value, 'day', true);
    const result = {
        day: parseInt(diff),
        hour: parseInt(24 * (diff % 1))
    }
    let dayText = '';
    let hoursText = '';
    if (result.hour && result.hour > 1) {
        hoursText = result.hour + ' hours'
    }
    if (result.hour && result.hour == 1) {
        hoursText = result.hour + ' hour'
    }
    if (result.day && result.day > 1) {
        dayText = result.day + ' days '
    }
    if (result.day && result.day == 1) {
        dayText = result.day + ' day '
    }
    return dayText + hoursText;
}

function disabledDate(current) {
    // Can not select days before today and today
    return current && current < dayjs().addBusinessDays(1);
};
import {useDateFormat, useNow} from '@vueuse/core'

const formatter = ref('HH:mm A dddd, MMMM D, YYYY')
const currentTime = useDateFormat(useNow(), formatter)
</script>

<template>
    <div class="title-wrapper relative min-h-[40px] xl:min-h-[75px] overflow-hidden">
        <div class="absolute top-0 left-0 z-10 flex flex-col justify-end w-full h-full">
            <div class="bg-white h-1/3"></div>
            <div class="h-1/3"
                 style="background: linear-gradient( to right, rgb(233,68,220) 0%, rgb(35,171,169) 25%, rgb(230,214,36) 50%, rgb(35,171,169) 75%, rgb(233,68,220) 100%); background-size: 200%; background-position: center;">
            </div>
            <div class="bg-white h-1/3"></div>
        </div>
        <div class="absolute top-0 z-20 flex flex-col w-auto h-full -translate-x-1/2 left-1/2">
            <div class="relative flex flex-col items-center justify-center h-full m-0 whitespace-no-wrap">
                <div class="hidden h-1/3"></div>
                <div class="absolute bg-white h-1/3 mid-skew"></div>
                <div class="hidden h-1/3"></div>
                <div>
                    <h1
                        class="title font-black mb-0 mt-2 relative text-center uppercase text-xl md:text-[42px] lg:text-[56px] 2xl:text-[72px] whitespace-nowrap">
                        e-Visa Apply Online</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container mx-auto px-4 lg:mt-20 mt-10 mb-5 lg:mb-10 text-center">
        <div class="">
            <a-steps class="w-full lg:w-[700px] m-auto " v-model:current="current" status="success" :items="[
                {
                    title: 'Visa Options'
                },
                {
                    title: 'Applicant Detail',
                },
                {
                    title: 'Review & Payment',
                },
            ]"></a-steps>
        </div>
    </div>
    <div class="container mx-auto px-4 bg1">
        <div class="fS">
            <a-form v-bind="formConfig" :model="formState" ref="form" class="!2xl:text-lg" method="post"
                    novalidate="novalidate">
                <div class="flex flex-wrap -mx-4" v-if="current == 0">
                    <div class="w-full px-4 md:w-1/2 lg:w-1/3">
                        <a-form-item name="number_of_visa" :rules="[{ required: true }]" class="has-feedback">
                            <template #label>
                                <label class="block mb-2 font-semibold uppercase" for="number_of_visa">Number of
                                    applicants</label>
                            </template>
                            <a-select ref="select" v-model:value="formState.number_of_visa" id="number_of_visa"
                                      class="w-full bg-gray-50 shadow border-0 rounded-none cursor-pointer"
                                      placeholder="Select number of applicants">
                                <a-select-option v-for="n in 20" :value="n" :key="n">{{ n }}</a-select-option>
                            </a-select>
                        </a-form-item>
                        <a-form-item name="type_of_visa" :rules="[{ required: true }]"
                                     class="mt-4 lg:mt-6 has-feedback">
                            <template #label>
                                <label class="block mb-2 font-semibold uppercase" for="type_of_visa">Type of
                                    visa</label>
                            </template>
                            <ApiData v-model:value="typeVisaList" url="master-data/type-of-visa/options">
                                <template #default="{data}">

                                    <a-select ref="select" v-model:value="formState.type_of_visa" id="type_of_visa"
                                              class="w-full bg-gray-50 shadow border-0 rounded-none cursor-pointer">
                                        <template v-for="option in data">
                                            <a-select-option v-if="option.status == 'active'" :value="option.value">
                                                {{ option.label }}
                                            </a-select-option>
                                        </template>

                                    </a-select>
                                </template>

                            </ApiData>
                        </a-form-item>

                        <a-form-item name="entry_port" :rules="[{ required: true }]" class="mt-4 lg:mt-6 has-feedback">
                            <template #label>
                                <label class="block mb-2 font-semibold uppercase" for="type_of_visa">Entry Port</label>
                            </template>
                            <a-select class="w-full bg-gray-50 shadow border-0 rounded-none cursor-pointer" show-search
                                      v-model:value="formState.entry_port" style="width: 300px"
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
                        </a-form-item>
                    </div>
                    <div class="w-full px-4 mt-5 md:w-1/2 lg:w-1/3 md:mt-0 ">
                        <a-form-item name="date_arrival" :rules="[{ required: true }]"
                                     class="mt-4 lg:mt-6 has-feedback">
                            <template #label>

                                <label class="block mb-2 font-semibold uppercase" for="type_of_visa">Date of
                                    Arrival</label>
                            </template>
                            <a-date-picker :disabled-date="disabledDate"
                                           class="w-full bg-gray-50 shadow border-0 rounded-none cursor-pointer"
                                           style="width: 300px" v-model:value="formState.date_arrival"
                                           format="YYYY-MM-DD"/>
                        </a-form-item>
                        <a-form-item class="inner">
                            <span class="block mb-2 font-semibold uppercase">Processing Time</span>
                            <ApiData @change="calculateDueDate" v-model:value="typeProcessingList"
                                     url="master-data/visa-processing-time/options">
                                <template #default="{data}">
                                    <a-radio-group @change="calculateDueDate" v-model:value="formState.processing_time">
                                        <template v-for="option in data">
                                            <a-radio class="m-0 mb-4"
                                                     v-if="option.status == 'active' && !option.contact_admin"
                                                     :value="option.value">{{ option.label }}
                                            </a-radio>
                                        </template>

                                    </a-radio-group>

                                </template>

                            </ApiData>


                        </a-form-item>
                    </div>
                    <div class="w-full px-4 mt-5 md:w-1/2 lg:w-1/3 lg:mt-0">
                        <a-alert class="mb-5 border-dashed" message="Estimated delivery time" type="error">
                            <template #description>
                                <p class="text-red-500">
                                    {{ formState.due_date?.tz(guessTz).format('HH:mm') }}
                                    {{ formState.due_date?.tz(guessTz).format('dddd, MMMM D, YYYY') }}
                                    ( {{ getDueDateDiffHuman() }} from now)
                                </p>
                            </template>
                        </a-alert>
                        <div class="font-semibold uppercase">Service fee:</div>
                        <div class="mt-2 font-semibold text-[36px] 2xl:text-[48px] leading-none"><span id="lblTotal"
                                                                                                       class="">US${{
                                calculateFee()
                            }}</span>
                        </div>
                        <div class="mt-2 text-base">*This fee excludes US $25 for the goverment e-visa fees.
                        </div>
                        <button @click="nextStep" type="button"
                                class="flex items-center justify-center transition p-4 mt-5 text-2xl text-white bg-black disabled:bg-gray-300 disabled:text-gray-700 2xl:text-3xl w-full">
                            Next Step
                        </button>
                        <div class="mt-1">(Current time in Vietnam: {{ today.format('HH:mm A dddd, MMMM D, YYYY') }})
                        </div>
                    </div>
                </div>
                <!-- <a-col :xs="24" :xl="16">
                    <a-form-item props="number_of_visa" :rules="[{ required: true }]"
                        label="Number of applicants">
                        <a-input-number class="w-[200px] pl-5" :min="1" :max="5"
                            v-model:value="formState.number_of_visa">
                            <template #addonBefore>
                                <div class="w-full h-full cursor-pointer hover:text-blue-500"
                                    @click.prevent="formState.number_of_visa > 1 ? formState.number_of_visa -= 1 : ''"
                                    :disabled="formState.number_of_visa <= 1">-
                                </div>
                            </template>
                            <template #addonAfter>
                                <div type="icon" class="w-full h-full cursor-pointer hover:text-blue-500"
                                    @click.prevent="formState.number_of_visa < 5 ? formState.number_of_visa += 1 : ''"
                                    :disabled="formState.number_of_visa >= 5">+
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

                    <a-form-item props="processing_time" :rules="[{ required: true }]" label="Processing Time">
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
                            :show-time="{ format: 'HH:mm' }" format="YYYY-MM-DD HH:mm" />
                    </a-form-item>

                </a-col>
                <a-col :xs="24" :xl="8">
                    <a-descriptions title="SUMMARY" :column="1" bordered>
                        <a-descriptions-item label="TOTAL E-VISA FEES:"><b>${{ calculateFee() }} US</b>
                        </a-descriptions-item>
                    </a-descriptions>
                    <p class="text-right">
                        <button @click="current += 1"
                            :disabled="!formState.date_arrival || !formState.entry_port" style="margin-top:50px"
                            type="button"
                            class="text-white disabled:!bg-blue-300 mt-50 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                            Next Step
                        </button>
                    <div class="fS1_fe">(Current time in Vietnam: 15:10 PM - Monday - August 14, 2023)</div>
                    </p>
                </a-col> -->

                <div class="flex flex-wrap -mx-4" v-if="current == 1">
                    <div class="w-full px-4 md:w-1/2 lg:w-2/3">
                        <a-tabs v-model:activeKey="activeKey">
                            <a-tab-pane v-for="number of formState.number_of_visa" :key="number"
                                        :tab="'Applicant ' + number">
                                <ApplicantForm prefix="applicants" :index="number-1"
                                               v-model:value="formState.applicants[number - 1]"></ApplicantForm>
                            </a-tab-pane>
                        </a-tabs>
                    </div>
                    <div class="w-full px-4 md:w-1/2 lg:w-1/3">
                        <a-form-item prop="contact_name" label="Contact Name" :rules="[{ required: true }]">
                            <a-input v-model:value="formState.contact_name"/>
                        </a-form-item>
                        <a-form-item prop="contact_email" label="Contact Email" :rules="[{ required: true }]">
                            <a-input v-model:value="formState.contact_email"/>
                        </a-form-item>
                        <a-form-item prop="contact_phone" label="Contact Phone" :rules="[{ required: true }]">
                            <a-input v-model:value="formState.contact_phone"/>
                        </a-form-item>
                        <div class="font-semibold uppercase">Service fee:</div>
                        <div class="mt-2 font-semibold text-[36px] 2xl:text-[48px] leading-none"><span id="lblTotal"
                                                                                                       class="">US${{
                                calculateFee()
                            }}</span>
                        </div>
                        <div class="mt-2 text-base">*This fee excludes US $25 for the goverment e-visa fees.
                        </div>
                        <button @click="submitForm" type="button"
                                class="flex items-center justify-center transition p-4 mt-5 text-2xl text-white bg-black disabled:bg-gray-300 disabled:text-gray-700 2xl:text-3xl w-full">
                            Next Step
                        </button>
                        <div class="mt-1">(Current time in Vietnam: {{ today.format('HH:mm A dddd, MMMM D, YYYY') }})
                        </div>
                    </div>
                </div>
                <div class="flex flex-wrap -mx-4" v-if="current == 2">
                    <div class="w-full px-4 md:w-1/2 lg:w-2/3">
                        <a-result style="margin:0 auto" status="success" title="Successfully!"
                                  sub-title="Order number: 2017182818828182881 We will contact with you soon, please wait.">
                        </a-result>
                    </div>
                    <div class="w-full px-4 md:w-1/2 lg:w-1/3">
                        <div class="mb-4">
                            <button
                                class="font-medium text-sm inline-flex items-center justify-center px-3 py-2 border border-transparent rounded leading-5 shadow-sm transition duration-150 ease-in-out w-full bg-indigo-500 hover:bg-indigo-600 text-white focus:outline-none focus-visible:ring-2">
                                Pay with PayPal - $253.00
                            </button>
                        </div>
                        <div class="text-xs text-gray-500 italic text-center">You'll be charged $253, including
                            $48 for VAT in Italy
                        </div>
                    </div>
                </div>

            </a-form>
        </div>
    </div>
</template>
<style scoped></style>
