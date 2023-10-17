<script setup>
import {ref, onMounted} from "vue";
import {load} from 'recaptcha-v3'

const token = ref(null);
const container = ref(null);
const props = defineProps({
    site_key: String,
})
onMounted(() => {
    load(props.site_key, {
        useRecaptchaNet: true,
        autoHideBadge: true,
        container: container.value
    }).then((recaptcha) => {
        recaptcha.execute('<action>').then((token) => {
            token.value = token
        })
    })
})

</script>

<template>
    <div ref="container" id="recaptcha-container">
        <input type="hidden" :value="token">
    </div>
</template>
