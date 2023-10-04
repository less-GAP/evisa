<script setup>
import {googleSdkLoaded} from "vue3-google-login"

const props = defineProps({
    client_id: String,
})
const login = () => {
    googleSdkLoaded((google) => {
        google.accounts.oauth2.initCodeClient({
            client_id: props.client_id,
            scope: 'email profile openid',
            callback: (response) => {
                console.log("Handle the response", response)
            }
        }).requestCode()
    })
}
</script>

<template>
    <div  @click="login">
        <slot></slot>
    </div>
</template>
