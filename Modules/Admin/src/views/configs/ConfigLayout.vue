<script setup>
import {ref, h} from "vue";
import {AppstoreOutlined, MailOutlined} from '@ant-design/icons-vue';
import router from "@/router";
import LayoutAuthenticated from "@/layouts/LayoutAuthenticated.vue";

const items = ref([
    {
      key: 'General',
      icon: () => h(MailOutlined),
      label: 'General',
      href: '/configs/general',
      title: 'General',
    },

    {
      key: 'smtp',
      icon: () => h(AppstoreOutlined),
      href: '/configs/smtp',
      label: 'SMTP',
      title: 'SMTP',
    },
    {
      key: 'data-country',
      icon: () => h(AppstoreOutlined),
      href: '/configs/data/country',
      label: 'Data Country',
      title: 'Data Country',
    } ,
    {
      key: 'processing-time',
      icon: () => h(AppstoreOutlined),
      href: '/configs/data/processing-time',
      label: 'Processing Time',
      title: 'Processing Time',
    }

  ])
;

function menuClick({item}) {
  if (item.href) {
    router.push(item.href)
  }
}
</script>

<template>
  <LayoutAuthenticated>
    <a-layout>
      <a-menu @click="menuClick" mode="horizontal" :items="items">
      </a-menu>
      <a-layout-content
        :style="{ background: '#fff', padding: '24px', margin: 0, minHeight: '280px' }"
      >
        <router-view/>
      </a-layout-content>
    </a-layout>
  </LayoutAuthenticated>

</template>
