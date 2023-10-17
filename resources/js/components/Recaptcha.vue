<script setup>
import {ref, onMounted} from "vue";
import {load} from 'recaptcha-v3'

const result = ref(null);
const container = ref(null);
const props = defineProps({
    site_key: String,
})
onMounted(() => {
    load(props.site_key, {
        useRecaptchaNet: true,
        autoHideBadge: true,
        action: 'validate_captcha',
        container: container.value
    }).then((recaptcha) => {
        recaptcha.execute('submit').then((token) => {
            result.value = token
        })
    })
})

</script>

<template>
    <div ref="container" id="recaptcha-container">
        <input type="hidden" name="action" value="validate_captcha">
        <input name="g-recaptcha-response" type="hidden" :value="result">
    </div>
</template>
