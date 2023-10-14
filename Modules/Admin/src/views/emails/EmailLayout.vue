<script setup>
import {ref, h} from "vue";
import {AppstoreOutlined, MailOutlined} from '@ant-design/icons-vue';
import router from "@/router";
import LayoutAuthenticated from "@/layouts/LayoutAuthenticated.vue";

const items = ref([
  {
    key: 'email-history',
    icon: () => h(MailOutlined),
    label: 'History',
    href: '/email/history',
    title: 'History',
  },
  {
    key: 'email-templates',
    icon: () => h(AppstoreOutlined),
    href: '/email/templates',
    label: 'Templates',
    title: 'Templates',
  },
  {
    key: 'email-config',
    icon: () => h(AppstoreOutlined),
    href: '/email/config',
    label: 'Config',
    title: 'Config',
  },


]);

function menuClick({item}) {
  if (item.href) {
    router.replace(item.href)
  }
}
</script>

<template>
  <LayoutAuthenticated>
    <a-layout class="rounded-xl overflow-hidden shadow">
      <a-menu :selectedKeys="[$appState.currentRoute?.name]"  mode="horizontal" class="h-full" @click="menuClick" :items="items">
      </a-menu>
      <a-layout-content
        :style="{ background: '#fff', padding: '24px', margin: 0, minHeight: '280px' }"
      >
        <router-view/>
      </a-layout-content>
    </a-layout>
  </LayoutAuthenticated>

</template>
