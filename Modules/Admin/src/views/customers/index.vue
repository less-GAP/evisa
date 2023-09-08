<script setup>
import {reactive, ref, h, watch} from "vue";
import SectionMain from "@/components/SectionMain.vue";
import LayoutAuthenticated from "@/layouts/LayoutAuthenticated.vue";
import {DataTable,RemoteSelect} from "@/components";
import router from "@/router";
import {UseEloquentRouter} from "@/utils/UseEloquentRouter";
import {UseDataTable} from "@/utils/UseDataTable";

const prefix = 'customer'
const {
  fetchListApi,
  createApi,
  deleteApi,
  updateApi
} = UseEloquentRouter(prefix)
const isShowModal = ref(false)

const itemActions = [
  {
    label: 'Edit',
    action: (item, reload) => {
      //showEditUser({}, reload)
      router.push(prefix + '/' + item.id)
    }
  }
]
const listActions = [
  // {
  //   label: 'Add',
  //   action: (reload) => {
  //     //showEditUser({}, reload)
  //     router.push(prefix + '/new')
  //   }
  // }
]
const columns = [
   {title: 'Name', key: 'full_name'}
  , {title: 'Phone', key: 'phone'}
  , {title: 'Current Level', key: 'customer_level'}
  , {title: 'Status', key: 'status'}
  , {title: 'Type', key: 'type'}
  , {title: 'Submit Visa Number', key: 'submited_count'}
  , {title: 'Joined date', key: 'created_at'}
]


const tableConfig = UseDataTable(fetchListApi, {
  columns,
  listActions,
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

</script>

<template>
  <LayoutAuthenticated>
    <DataTable @register="registerTable"  v-bind="tableConfig">
      <template #cellAction[delete]="{item,actionMethod}">
        <a-popconfirm
          title="Are you sure delete this user?"
          ok-text="Yes"
          cancel-text="No"
          @confirm="actionMethod"
        >
          <a-button
            type="text"
            v-if="item.role !== 'admin'"
            danger
            :icon="h(DeleteOutlined)"
            label=""
            :outline="true"
          >

          </a-button>

        </a-popconfirm>
      </template>
      <template #cell[full_name]="{item,column}">
        <img class="w-10 h-10 float-left rounded-full" :src="item.profile_photo_url"
             :alt="item.full_name">
        <div class="pl-3 float-left">
          <div class="text-base font-semibold">{{ item.full_name }}</div>
          <div class="font-normal text-gray-500">{{ item.email }}</div>
        </div>
      </template>
      <template #cell[status]="{item,column}">
        <a-switch @change="updateApi(item.id,{status:item.status})" checkedValue="active" unCheckedValue="inactive"
                  v-model:checked="item.status"/>
      </template>
      <template #cell[customer_level]="{item,column}">

        <RemoteSelect @change="updateApi(item.id,{customer_level:item.customer_level})"  v-model:value="item.customer_level" url="visa-customer-level/all" valueKey="id" labelKey="name"></RemoteSelect>

      </template>
    </DataTable>

  </LayoutAuthenticated>
  <router-view></router-view>
</template>
