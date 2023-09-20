<script setup>
import {ref, h} from "vue";
import {AppstoreOutlined, MailOutlined} from '@ant-design/icons-vue';
import router from "@/router";
import LayoutAuthenticated from "@/layouts/LayoutAuthenticated.vue";

const items = ref([

    {
      key: 'visa-customer-level',
      icon: () => h(AppstoreOutlined),
      href: '/master-data/visa-customer-level',
      label: 'Customer Level',
      title: 'Customer Level',
    },
    {
      key: 'data-country',
      icon: () => h(AppstoreOutlined),
      href: '/master-data/country',
      label: 'Data Country',
      title: 'Data Country',
    },
    // {
    //   key: 'processing-time',
    //   icon: () => h(AppstoreOutlined),
    //   href: '/master-data/processing-time',
    //   label: 'Processing Time',
    //   title: 'Processing Time',
    // },
    {
      key: 'type-of-visa',
      icon: () => h(AppstoreOutlined),
      href: '/master-data/type-of-visa',
      label: 'Type of visa',
    },
    {
      key: 'site-menu',
      icon: () => h(AppstoreOutlined),
      href: '/master-data/site-menu',
      label: 'Site menu',
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
