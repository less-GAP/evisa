<script setup>
import {reactive, ref, h, watch} from "vue";
import SectionMain from "@/components/SectionMain.vue";
import LayoutAuthenticated from "@/layouts/LayoutAuthenticated.vue";
import {DataTable, BaseIcon} from "@/components";
import router from "@/router";
import {UseEloquentRouter} from "@/utils/UseEloquentRouter";
import {UseDataTable} from "@/utils/UseDataTable";
import {mdiAccountGroupOutline} from "@mdi/js";
import {CloudDownloadOutlined, CheckCircleOutlined} from "@ant-design/icons-vue"
import {url} from "@/utils/Url";
import Api from "@/utils/Api";

const props = defineProps({
  status: String
})
const prefix = 'visa-application'
const filter = {
  'status': props.status
}
const {
  fetchListApi,
  createApi,
  deleteApi,
  updateApi
} = UseEloquentRouter(prefix, {
  'include': 'user'
})
const isShowModal = ref(false)

const itemActions = [
  {
    label: 'View',
    action: (item, reload) => {
      //showEditUser({}, reload)
      router.replace('/visa/' + props.status + '/' + item.id)
    }
  }
]
const listActions = []
const columns = [
  {
    title: 'Contact name',
    key: 'contact_name',
    width: 200
  },
  {
    title: 'Agency/User',
    key: 'user',
  },

  {
    title: 'Applicants',
    key: 'number_of_visa',
    width: 50
  },

  {
    title: 'Payment Status',
    key: 'payment_status',
    width: 200
  },
  {
    title: 'Status',
    key: 'status',
    width: 200
  },
  {
    title: 'Due Date',
    key: 'est_delivery_time',
    width: 200
  },
  {
    title: 'Date Arrival',
    key: 'date_arrival',
    width: 200
  },
  {
    title: 'Created at',
    key: 'created_at',
    width: 200
  },
]


const tableConfig = UseDataTable(fetchListApi, {
  showReload: true,
  pagination: {
    page: 1,
    total: 0,
    perPage: props.status == 'approved' ? 100 : 20
  },
  columns,
  listActions,
  filter,
  itemActions
})
let reloadTable = () => {
}

watch(router.currentRoute, (data) => {
  if (data.path === prefix) {
    reloadTable()
  }
});

function registerTable({reload}) {
  reloadTable = reload
}

function exportVisa(items) {
  const ids = items.map(item => item.id)
  window.open(url('admin/api/visa-application/export?id=' + ids.join(',')), '_blank')
  setTimeout(() => {
    reloadTable()
  }, 500)

}

async function doneVisa(items) {
  const ids = items.map(item => item.id)
  await Api.post('visa-application/doneList?id=' + ids.join(','))
  reloadTable()

}
</script>

<template>
  <!--- more free and premium Tailwind CSS components at https://tailwinduikit.com/ --->
  <DataTable @register="registerTable" class="mt-5" v-bind="tableConfig">
    <template #action="{selectedItems}">
      <a-popconfirm
        v-if="status=='approved'"
        title="Are you sure?"
        ok-text="Yes"
        cancel-text="No"
        @confirm="exportVisa(selectedItems)"
      >
        <a-button :disabled="!selectedItems.length" type="primary">
          <template #icon>
            <CloudDownloadOutlined/>
          </template>
          Export
        </a-button>
      </a-popconfirm>
      <a-popconfirm
        v-if="status=='exported'"
        title="Are you sure?"
        ok-text="Yes"
        cancel-text="No"
        @confirm="doneVisa(selectedItems)"
      >
        <a-button :disabled="!selectedItems.length" type="primary">
          <template #icon>
            <CheckCircleOutlined/>
          </template>
          Done
        </a-button>
      </a-popconfirm>
    </template>
    <template #header="{filter,reload}">
      <div class="flex w-full justify-between">
        <div class="flex items-center">
        </div>
        <span></span>

      </div>
    </template>
    <template #cell[user]="{item}">
      {{ item.user?.full_name }}
    </template>
    <template #cell[number_of_visa]="{item}">
      <div class="flex items-center">
        {{ item.number_of_visa }}
      </div>
    </template>
    <template #cell[payment_status]="{item}">
      <span v-if="item.payment_status=='waiting'"
            class="bg-yellow-100  text-ellipsis text-yellow-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-yellow-300 border border-yellow-300">Waiting for payment</span>

      <span v-else-if="item.payment_status=='done'"
            class="bg-green-100 text-ellipsis text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-green-400 border border-green-400">{{
          item.payment_status
        }}</span>
      <span v-else
            class="bg-red-100 text-ellipsis text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-green-400 border border-red-400">{{
          item.payment_status
        }}</span>


    </template>
    <template #cell[status]="{item}">

      <span v-if="item.status=='waiting-payment'"
            class="bg-yellow-100  text-ellipsis text-yellow-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-yellow-300 border border-yellow-300">Waiting for payment</span>


      <span v-else-if="item.status=='approved' || item.status=='done' || item.status=='exported'"
            class="bg-green-100 text-ellipsis text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-green-400 border border-green-400">{{
          item.status
        }}</span>
      <span v-else-if="item.status=='rejected'"
            class="bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-red-400 border border-red-400">{{
          item.status
        }}</span>

      <span v-else
            class="bg-yellow-100  text-ellipsis text-yellow-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-yellow-300 border border-yellow-300">{{
          item.status.split('-').join(' ')
        }}</span>

    </template>
  </DataTable>


</template>
<style>.checkbox:checked + .check-icon {
  display: flex;
}
</style>
