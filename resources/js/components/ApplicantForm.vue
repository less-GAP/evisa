<script setup>
import {reactive, ref} from "vue";
import {message} from 'ant-design-vue';
import InputUpload from "./InputUpload.vue";
import RemoteSelect from "./RemoteSelect.vue";

const props = defineProps({
    value: Object,
    level:  [String, Number],
    prefix: [String, Number],
    index: [String, Number],
    photo_placeholder: String,
    passport_placeholder: String
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
    isNew: true,
    full_name: "",
    username: "",
    email: "",
    role: "user",
    password: "",
});

const formConfig = reactive({
    "validateTrigger": "submit",
    "label-align": "top",
    "model": formState,
    labelCol: {span: 24},
    wrapperCol: {span: 24},
    "validate-messages": validateMessages,
});

const cancel = function () {
    emit('cancel')
}


</script>

<template>
    <a-form-item :name="[prefix,index, 'profile_photo']" class="w-1/2 inline-block"
                 :rules="[{ required: true }]">
        <template #label>
          Photo (4x6cm, white background)
        </template>
        <InputUpload :placeholder="photo_placeholder" width="153px" height="230px"
                     v-model:value="value.profile_photo"></InputUpload>
    </a-form-item>
    <a-form-item :name="[prefix,index, 'passport_photo']" class="w-1/2  inline-block"
                 :rules="[{ required: true }]">
        <template #label>
            Passport scan
        </template>
        <InputUpload :placeholder="passport_placeholder" width="346px" height="230px"
                     v-model:value="value.passport_photo"></InputUpload>
    </a-form-item>
    <a-form-item :name="[prefix,index, 'full_name']" name="" label="Full name as in passport"
                 :rules="[{ required: true }]">
        <a-input v-model:value="value.full_name"/>
    </a-form-item>
    <a-form-item :name="[prefix,index, 'nationality']" label="Nationality" :rules="[{ required: true }]">
        <RemoteSelect labelKey="name" valueKey="code" url="master-data/country/options" show-search
                      v-model:value="value.nationality"
                      class="w-full bg-gray-50 shadow border-0 rounded-none cursor-pointer"></RemoteSelect>

    </a-form-item>
    <a-form-item :name="[prefix,index, 'passport_number']" label="Passport number" :rules="[{ required: true }]">
        <a-input v-model:value="value.passport_number"/>
    </a-form-item>
    <a-form-item :name="[prefix,index, 'email']" label="Email" :rules="[{ required: true }]">
        <a-input v-model:value="value.email"/>
    </a-form-item>


</template>
