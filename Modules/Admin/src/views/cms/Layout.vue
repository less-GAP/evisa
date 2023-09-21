<script setup>
import {ref, h} from "vue";
import {AppstoreOutlined, MailOutlined} from '@ant-design/icons-vue';
import router from "@/router";
import LayoutAuthenticated from "@/layouts/LayoutAuthenticated.vue";

</script>

<template>
  <LayoutAuthenticated>
    <router-view  v-slot="{ Component }">
      <transition>
        <keep-alive :max="5">
            <component :key="$route.fullPath"  :is="Component"/>
        </keep-alive>
      </transition>
    </router-view>
  </LayoutAuthenticated>

</template>
