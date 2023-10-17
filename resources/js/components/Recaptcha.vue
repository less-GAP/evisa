<script setup>
import {ref, onMounted} from "vue";
import {load} from 'recaptcha-v3'

const result = ref(null);
const container = ref(null);
const props = defineProps({
    site_key: String,
    action: String,
})
onMounted(() => {
    load(props.site_key, {
        useRecaptchaNet: true,
        container: container.value,
        autoHideBadge: true
    }).then((recaptcha) => {
        recaptcha.execute({action: props.action}).then(function (token) {
            result.value = token
            // Add your logic to submit to your backend server here.
        });
    })
})

</script>

<template>
    <slot v-bind="{result}"></slot>
</template>
