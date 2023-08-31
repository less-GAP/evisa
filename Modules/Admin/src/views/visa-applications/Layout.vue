<script setup>
import {ref, h, watch} from "vue";
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
import FormPage from "./FormPage.vue"
import ViewDetail from "./ViewDetail.vue"
let action = router.currentRoute.value.params.action
const items = ref([
    {
      key: 'visa-waiting-payment',
      icon: () => h(DollarCircleOutlined),
      href: '/visa-waiting-payment',
      label: 'Waiting Payment',
    },
    {
      key: 'visa-pending-preview',
      icon: () => h(FieldTimeOutlined),
      href: '/visa-pending-preview',
      label: 'Pending Preview',
    },
    {
      key: 'visa-approved',
      icon: () => h(CheckOutlined),
      href: '/visa-approved',
      label: 'Approved',
    },
    {
      key: 'visa-exported',
      icon: () => h(ExportOutlined),
      href: '/visa-exported',
      label: 'Exported',
    },
    {
      key: 'visa-rejected',
      icon: () => h(InfoCircleOutlined),
      href: '/visa-rejected',
      label: 'Rejected',
    },
    {
      key: 'visa-pending-done',
      icon: () => h(SafetyOutlined),
      href: '/visa-done',
      label: 'Done',
    },


  ])
;

const showCreate = ref(action === 'new')
const showDetail = ref(typeof action !=='undefined' && action !== 'new' && action !== '')
function updateAction(){
  action = router.currentRoute.value.params.action
  showCreate.value = action === 'new'
  showDetail.value = typeof action !=='undefined' && action !== 'new' && action !== ''
}
watch(router.currentRoute, (data) => {
  updateAction()
});
function menuClick({item}) {
  if (item.href) {
    router.push(item.href)
  }
}
function close(){
  router.replace({ path: '/visa' })
}
</script>

<template>
  <LayoutAuthenticated>
    <template #header-content>
      <div class="flex items-center justify-between mb-5">
        <p tabindex="0"
           class="focus:outline-none text-base sm:text-lg md:text-xl lg:text-2xl font-bold leading-normal text-gray-800">
          Visa Applications</p>
        <router-link to="/visa/new" type="primary"
                     class="focus:ring-2 float-right focus:ring-offset-2 focus:ring-indigo-600 mt-4 sm:mt-0 inline-flex items-start justify-start px-6 py-3 bg-indigo-700 hover:bg-indigo-600 focus:outline-none rounded">
          <span class="text-sm font-medium leading-none text-white">Add New</span>
        </router-link>
      </div>
    </template>
    <a-layout>
      <a-menu @click="menuClick" mode="horizontal" :items="items">

      </a-menu>
      <a-layout-content
        :style="{ background: '#fff', margin: 0, minHeight: '280px' }"
      >
        <router-view/>
      </a-layout-content>
    </a-layout>
    <a-drawer @close="close" width="90vw" :open="showCreate">
      <FormPage></FormPage>
    </a-drawer>
    <a-drawer  @close="close"  width="90vw" :open="showDetail">
      <ViewDetail :id="action"></ViewDetail>
    </a-drawer>
  </LayoutAuthenticated>

</template>
