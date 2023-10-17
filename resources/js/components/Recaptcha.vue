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
        badge: 'inline',
        useRecaptchaNet: true,
        container: container.value,
        autoHideBadge: true
    }).then((recaptcha) => {
        recaptcha.execute().then(function (token) {
            result.value = token
            // Add your logic to submit to your backend server here.
        });
    })
})

</script>

<template>
    <div ref="container" id="recaptcha">
        <input required name="g-recaptcha-response" type="hidden" :value="result">
    </div>
</template>
