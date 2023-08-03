<script setup>
import { ref, h} from "vue";
import {AppstoreOutlined, MailOutlined} from '@ant-design/icons-vue';
import router from "@/router";
import LayoutAuthenticated from "@/layouts/LayoutAuthenticated.vue";

const items = ref([
  {
    key: 'General',
    icon: () => h(MailOutlined),
    label: 'General',
    href:'/configs/general',
    title: 'General',
  },

  {
    key: 'smtp',
    icon: () => h(AppstoreOutlined),
    href:'/configs/smtp',
    label: 'SMTP',
    title: 'SMTP',
  },


]);
function menuClick({item}){
  if(item.href){
    router.push(item.href)
  }
}
</script>

<template>
  <LayoutAuthenticated>
    <a-layout>
      <a-layout-sider  style="width:300px;background: #fff;max-width:40vw;">
        <a-menu @click="menuClick"  mode="vertical" :items="items">
        </a-menu>
      </a-layout-sider>
      <a-layout-content
        :style="{ background: '#fff', padding: '24px', margin: 0, minHeight: '280px' }"
      >
        <router-view />
      </a-layout-content>
    </a-layout>
  </LayoutAuthenticated>

</template>
