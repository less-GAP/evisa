<script setup>
import {ref, h} from "vue";
import {AppstoreOutlined, MailOutlined} from '@ant-design/icons-vue';
import router from "@/router";
import LayoutAuthenticated from "@/layouts/LayoutAuthenticated.vue";

</script>

<template>
  <LayoutAuthenticated>
    <router-view >
    </router-view>
  </LayoutAuthenticated>

</template>
