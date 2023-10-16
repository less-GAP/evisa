<script setup>
import {reactive, ref, h, watch} from "vue";
import {mdiBallotOutline, mdiDelete} from "@mdi/js";
import {Modal, DataTable} from "@/components";
import router from "@/router";
import LayoutAuthenticated from "@/layouts/LayoutAuthenticated.vue";

import {UseEloquentRouter} from "@/utils/UseEloquentRouter";
import {UseDataTable} from "@/utils/UseDataTable";
import * as $format from "@/utils/Format"

const prefix = 'email'
const routePath = '/email-histories'
const {
  fetchListApi,
  createApi,
  deleteApi,
  updateApi
} = UseEloquentRouter(prefix, {
  order: '-id'
})
const isShowModal = ref(false)

const itemActions = [
  {
    label: 'View',
    action: (item, reload) => {
      //showEditUser({}, reload)
      router.push(routePath + '/' + item.id)
    }
  },

]
const listActions = []
const columns = [
  {
    title: 'Id',
    key: 'id',
    width:50
  },
  {
    title: 'Title',
    key: 'email_title',

  },
  {
    title: 'Email To',
    key: 'email_to',

  },
  {
    title: 'Status',
    key: 'status',
    width: 100
  },
  {
    title: 'Created at',
    key: 'created_at',
    width: 200
  },
  {
    title: 'Sent at',
    key: 'sent_at',
    width: 200
  },
]


const tableConfig = UseDataTable(fetchListApi, {
  columns,
  listActions,
  itemActions
})
let reloadTable = () => {
}

watch(router.currentRoute, (data) => {
  if (data.path === routePath) {
    reloadTable()
  }
});

function registerTable({reload}) {
  reloadTable = reload
}

</script>

<template>
  <LayoutAuthenticated>

    <DataTable @register="registerTable" v-bind="tableConfig">
      <template #cellAction[delete]="{item,actionMethod}">
        <a-popconfirm
          title="Bạn muốn xóa sản phẩm này?"
          ok-text="Yes"
          cancel-text="No"
          @confirm="actionMethod"
        >
          <a-button
            type="text"
            danger
            :icon="h(DeleteOutlined)"
            label=""
            :outline="true"
          >
          </a-button>
        </a-popconfirm>
      </template>
      <template #cellAction[edit]="{item,actionMethod}">
        <a-button
          class="mr-5"
          type="text"
          :icon="h(FormOutlined)"
          label=""
          :outline="true"
          @click="actionMethod"
        >
        </a-button>
      </template>
      <template #cell[image]="{item,column}">
        <a-image height="50px" class="w-20 h-auto" :src="item.image"
                 :alt="item.name"/>
      </template>

      <template #cell[status]="{item,column}">
        <a-tag v-if="item.status=='waiting'" color="warning">{{ item.status }}</a-tag>
        <a-tag v-if="item.status=='success'" color="success">{{ item.status }}</a-tag>
        <a-tag v-if="item.status=='error'" color="red">{{ item.status }}</a-tag>
      </template>
      <template #cell[is_default]="{item,column}">
        <a-switch @change="updateApi(item.id,{is_default:item.is_default})" :checkedValue="1" :unCheckedValue="0"
                  v-model:checked="item.is_default"/>
      </template>
    </DataTable>
    <router-view></router-view>
  </LayoutAuthenticated>

</template>
