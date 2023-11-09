<script setup>
import {ref, h} from "vue";
import {AppstoreOutlined, MailOutlined, MoneyCollectOutlined} from '@ant-design/icons-vue';
import router from "@/router";
import LayoutAuthenticated from "@/layouts/LayoutAuthenticated.vue";

const items = ref([
{
    key: 'config-general',
    // icon: () => h(MailOutlined),
    label: 'General',
    href:'/configs/general',
    title: 'General',
  },
    {
    key: 'config-images',
    // icon: () => h(MailOutlined),
    label: 'Images',
    href:'/configs/images',
    title: 'Images',
  },
  {
    key: 'PostsPages',
    // icon: () => h(OrderedListOutlined),
    label: 'Posts/Pages',
    href:'/configs/postspages',
    title: 'Posts/Pages',
  },
  {
    key: 'Cloudflare',
    label: 'Cloudflare',
    href:'/configs/cloudflare',
    title: 'Cloudflare',
  },
  {
    key: 'Google',
    label: 'Google API',
    href:'/configs/google',
    title: 'Google API',
  },
  {
    key: 'Facebook',
    label: 'Facebook API',
    href:'/configs/facebook',
    title: 'Facebook API',
  },
  {
    key: 'PaymentAPI',
    label: 'Payment',
    href:'/configs/payment',
    title: 'Payment API',
  },
  {
    key: 'QuickBooks',
    label: 'QuickBooks',
    href:'/configs/quickbooks',
    title: 'QuickBooks',
  },
  {
    key: 'Marketing',
    label: 'Marketing',
    href:'/configs/marketing',
    title: 'Marketing',
  },
  {
    key: 'Social',
    label: 'Social',
    href:'/configs/social',
    title: 'Social',
  },
  {
    key: 'config-smtp',
    // icon: () => h(AppstoreOutlined),
    href:'/configs/smtp',
    label: 'SMTP',
    title: 'SMTP',
  },
    {
      key: 'config-auth',
      // icon: () => h(AppstoreOutlined),
      href: '/configs/auth',
      label: 'Authenticate',
      title: 'Authenticate',
    },
    {
    key: 'config-system',
    href: '/configs/system',
    label: 'System',
    title: 'System',
  },
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
    <a-layout class="rounded-xl overflow-hidden shadow">
      <a-layout-sider  style="width:300px;background: #fff;max-width:40vw;">
      <a-menu :selectedKeys="[$appState.currentRoute?.name]" @click="menuClick" mode="vertical" :items="items">
      </a-menu>
      </a-layout-sider>
      <a-layout-content
        :style="{ background: '#fff', padding: '24px', margin: 0, minHeight: '280px' }"
      >
        <router-view/>
      </a-layout-content>
    </a-layout>
  </LayoutAuthenticated>

</template>
