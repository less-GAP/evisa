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
        useRecaptchaNet: false,
        container: container.value
    }).then((recaptcha) => {
        recaptcha.execute('submit').then(function (token) {
            // Add your logic to submit to your backend server here.
        });
    })
})

</script>

<template>
    <div ref="container" id="recaptcha-container">
        <button class="g-recaptcha"
                :data-sitekey="site_key"
                data-action='submit'>Submit
        </button>
        <input required name="g-recaptcha-response" type="hidden" :value="result">
    </div>
</template>
