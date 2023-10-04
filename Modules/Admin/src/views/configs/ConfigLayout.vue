<script setup>
import {ref, h} from "vue";
import {AppstoreOutlined, MailOutlined} from '@ant-design/icons-vue';
import router from "@/router";
import LayoutAuthenticated from "@/layouts/LayoutAuthenticated.vue";

const items = ref([
    {
      key: 'config-general',
      icon: () => h(MailOutlined),
      label: 'General',
      href: '/configs/general',
      title: 'General',
    },

    {
      key: 'config-smtp',
      icon: () => h(AppstoreOutlined),
      href: '/configs/smtp',
      label: 'SMTP',
      title: 'SMTP',
    },
    {
      key: 'config-auth',
      icon: () => h(AppstoreOutlined),
      href: '/configs/auth',
      label: 'Authenticate',
      title: 'Authenticate',
    }


  ])
;

function menuClick({item}) {
  if (item.href) {
    router.replace(item.href)
  }
}
</script>

<template>
  <LayoutAuthenticated>
    <a-layout>
      <a-menu :selectedKeys="[$appState.currentRoute?.name]" @click="menuClick" mode="horizontal" :items="items">
      </a-menu>
      <a-layout-content
        :style="{ background: '#fff', padding: '24px', margin: 0, minHeight: '280px' }"
      >
        <router-view/>
      </a-layout-content>
    </a-layout>
  </LayoutAuthenticated>

</template>
