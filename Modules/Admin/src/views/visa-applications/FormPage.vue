<script setup>
import {reactive, ref} from "vue";
import Api from "@/utils/Api";
import LayoutAuthenticated from "@/layouts/LayoutAuthenticated.vue";
import {message} from 'ant-design-vue';
import ApplicantForm from "./ApplicantForm.vue"
import {mdiAccountGroupOutline} from "@mdi/js";
import {BaseIcon} from "@/components";

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
const formState = reactive(props.value || {
  number_of_visa: 1,
  type_of_visa: 1,
  processing_time: 1,
  applicants: [{}],

});

const formConfig = reactive({
  "validateTrigger": "submit",
  "label-align": "top",
  "model": formState,
  labelCol: {span: 24},
  wrapperCol: {span: 24},
  "validate-messages": validateMessages,
});
const submit = async function () {
  loading.value = true
  Api.post('user', formState).then(result => {
    emit('success', result)
  }).catch(e => {
  }).finally(loading.value = false)
}
const cancel = function () {
  emit('cancel')
}


</script>

<template>
  <LayoutAuthenticated>
    <div class="py-4 md:py-7">
      <div class="flex items-center justify-between">
        <p tabindex="0"
           class="focus:outline-none text-base sm:text-lg md:text-xl lg:text-2xl font-bold leading-normal text-gray-800">
          Create Visa Applications</p>
      </div>
    </div>
    <a-card class="mb-3 text-right">
      <a-space class="float-right">
        <a-button :loading="loading" type="primary" html-type="submit">Submit</a-button>
      </a-space>
    </a-card>
    <a-form
      autocomplete="off"
      v-bind="formConfig"
      @finish="submit"
    >
      <a-card>

        <a-row :gutter="20">

          <a-col :span="8">
            <a-card>
              <a-form-item :rules="[{ required: true }]" label="Number of applicants">
                <a-input-number class="w-[200px] pl-5" :min="1" :max="5"
                                v-model:value="formState.number_of_visa">
                  <template #prefix>
                    <BaseIcon :path="mdiAccountGroupOutline"></BaseIcon>
                  </template>

                </a-input-number>
              </a-form-item>
              <a-divider></a-divider>
              <a-form-item :rules="[{ required: true }]" label="Type of visas">
                <a-radio-group v-model:value="formState.type_of_visa">
                  <a-radio :value="1">E-Visa (1 Month Single Entry)</a-radio>
                </a-radio-group>
              </a-form-item>
              <a-divider></a-divider>

              <a-form-item :rules="[{ required: true }]"
                           label="Processing Time">
                <a-radio-group v-model:value="formState.processing_time">
                  <a-radio class="w-full mb-3" :value="1">Standard processing (5-7 working days)</a-radio>
                  <a-radio class="w-full mb-3" :value="2">Urgent 2 Working Days (Mon-Fri)</a-radio>
                  <a-radio class="w-full mb-3" :value="3">Urgent 1 Working Day (Mon-Fri)</a-radio>
                  <a-radio :value="4">Same Day (4-8 Working Hours)</a-radio>
                </a-radio-group>
              </a-form-item>
              <a-divider></a-divider>

            </a-card>
          </a-col>
          <a-col :span="16">
            <a-tabs v-model:activeKey="activeKey" type="card">
              <a-tab-pane v-for="number of formState.number_of_visa" :key="number" :tab="'Applicant '+number">
                <ApplicantForm v-model:value="formState.applicants[number]"></ApplicantForm>
              </a-tab-pane>

            </a-tabs>

          </a-col>
        </a-row>
      </a-card>

    </a-form>
  </LayoutAuthenticated>
</template>
<style>
.ant-input-number-input:focus {
  border: 0 !important;
  box-shadow: 0 !important;
  outline: 0 !important;
  --tw-ring-color: transparent !important;
}
</style>
