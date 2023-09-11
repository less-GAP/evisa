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
import {DataTable} from "@/components";
import FormPage from "./FormPage.vue"
import ViewDetail from "./ViewDetail.vue"
import VisaTable from "./VisaTable.vue"
import {UseEloquentRouter} from "@/utils/UseEloquentRouter";
import {UseDataTable} from "@/utils/UseDataTable";

const prefix = 'visa-application'
const status = ref(router.currentRoute.value.params.status)
let action = router.currentRoute.value.params.action
const items = ref([
    // {
    //   key: 'waiting-payment',
    //   icon: () => h(DollarCircleOutlined),
    //   href: '/visa/waiting-payment',
    //   label: 'Waiting Payment',
    // },
    {
      key: 'pending-preview',
      icon: () => h(FieldTimeOutlined),
      href: '/visa/pending-preview',
      label: 'Pending Preview',
    },
    {
      key: 'approved',
      icon: () => h(CheckOutlined),
      href: '/visa/approved',
      label: 'Approved',
    },
    {
      key: 'exported',
      icon: () => h(ExportOutlined),
      href: '/visa/exported',
      label: 'Exported',
    },
    {
      key: 'rejected',
      icon: () => h(InfoCircleOutlined),
      href: '/visa/rejected',
      label: 'Rejected',
    },
    {
      key: 'done',
      icon: () => h(SafetyOutlined),
      href: '/visa/done',
      label: 'Done',
    },


  ])
const showCreate = ref(action === 'new')
const showDetail = ref(typeof action !== 'undefined' && action !== 'new' && action !== '')

function updateAction() {
  if (status.value !== router.currentRoute.value.params.status) {
    status.value = router.currentRoute.value.params.status
  }
}

watch(router.currentRoute, (data) => {
  updateAction()
});

function menuClick({item}) {
  if (item.href) {
    router.replace(item.href)
  }
}

function close() {
  router.replace({path: '/visa'})
}

</script>

<template>
  <LayoutAuthenticated>
    <template #header-content>
      <div class="flex items-center justify-between ">
        <p tabindex="0"
           class="focus:outline-none text-base sm:text-lg md:text-xl lg:text-2xl font-bold leading-normal text-gray-800">
          Visa Applications</p>
<!--        <router-link to="/visa/new" type="primary"-->
<!--                     class="focus:ring-2 float-right focus:ring-offset-2 focus:ring-indigo-600 mt-4 sm:mt-0 inline-flex items-start justify-start px-6 py-3 bg-indigo-700 hover:bg-indigo-600 focus:outline-none rounded">-->
<!--          <span class="text-sm font-medium leading-none text-white">Add New</span>-->
<!--        </router-link>-->
      </div>
    </template>
    <a-layout>
      <a-menu :selectedKeys="[status]" @click="menuClick" mode="horizontal" :items="items">

      </a-menu>
      <a-layout-content
        :style="{ background: '#fff', margin: 0, minHeight: '280px' }"
      >
        <VisaTable :key="status" :status="status"></VisaTable>
      </a-layout-content>
    </a-layout>
    <router-view/>
  </LayoutAuthenticated>
</template>
