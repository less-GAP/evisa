<script setup>
import {reactive, ref, h, watch} from "vue";
import SectionMain from "@/components/SectionMain.vue";
import LayoutAuthenticated from "@/layouts/LayoutAuthenticated.vue";
import {DataTable} from "@/components";
import router from "@/router";
import {UseEloquentRouter} from "@/utils/UseEloquentRouter";
import {UseDataTable} from "@/utils/UseDataTable";

const prefix = 'user'
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
  },
  {
    label: 'Delete',
    class: 'font-medium !text-red-600 dark:text-red-500 hover:underline',
    confirm:true,
    action(item, reload) {
      deleteApi(item.id).then(rs => {
      }).finally(() => {
        reload();
      });
    }
  }
]
const listActions = [
  {
    label: 'Add',
    action: (reload) => {
      //showEditUser({}, reload)
      router.push(prefix + '/new')
    }
  }
]
const columns = [
  {title: 'Username',width:200, key: 'username'}
  , {title: 'Name', key: 'full_name'}
  , {title: 'Role', key: 'role'}
  , {title: 'Status', key: 'status'}
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
    </DataTable>

  </LayoutAuthenticated>
  <router-view></router-view>
</template>
