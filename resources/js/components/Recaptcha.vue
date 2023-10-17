<script setup>
import {ref, onMounted} from "vue";
import {load} from 'recaptcha-v3'
const emit = defineEmits(["update:value"]);
const result = ref(null);
const container = ref(null);
const props = defineProps({
    site_key: String,
    value: String,
    action: String,
})
onMounted(() => {
    load(props.site_key, {
        badge: 'inline',
        useRecaptchaNet: true,
        autoHideBadge: true,
        container: container.value,
    }).then((recaptcha) => {
        recaptcha.execute('login').then(function (token) {
            result.value = token
            emit('update:value', token)
            // Add your logic to submit to your backend server here.
        });
    })
})

</script>

<template>
    <div ref="container" id="recaptcha">
        <slot v-bind="{result}"></slot>
    </div>
</template>
