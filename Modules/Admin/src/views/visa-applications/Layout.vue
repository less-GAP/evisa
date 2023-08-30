<script setup>
import {ref, h} from "vue";
import {
  AppstoreOutlined,
  MailOutlined,
  DollarCircleOutlined,
  CheckOutlined,
  FieldTimeOutlined,
  InfoCircleOutlined,
  SafetyOutlined,
  ExportOutlined
} from '@ant-design/icons-vue';
import router from "@/router";
import LayoutAuthenticated from "@/layouts/LayoutAuthenticated.vue";

const items = ref([
    {
      key: 'visa-waiting-payment',
      icon: () => h(DollarCircleOutlined),
      href: '/visa/waiting-payment',
      label: 'Waiting Payment',
    },
    {
      key: 'visa-pending-preview',
      icon: () => h(FieldTimeOutlined),
      href: '/visa/pending-preview',
      label: 'Pending Preview',
    },
    {
      key: 'visa-approved',
      icon: () => h(CheckOutlined),
      href: '/visa/approved',
      label: 'Approved',
    },
    {
      key: 'visa-exported',
      icon: () => h(ExportOutlined),
      href: '/visa/exported',
      label: 'Exported',
    },
    {
      key: 'visa-rejected',
      icon: () => h(InfoCircleOutlined),
      href: '/visa/rejected',
      label: 'Rejected',
    },
    {
      key: 'visa-pending-done',
      icon: () => h(SafetyOutlined),
      href: '/visa/done',
      label: 'Done',
    },


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
    <template #header-content>
      <div class="flex items-center justify-between mb-5">
        <p tabindex="0"
           class="focus:outline-none text-base sm:text-lg md:text-xl lg:text-2xl font-bold leading-normal text-gray-800">
          Visa Applications</p>
      </div>
    </template>
    <a-layout >
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
