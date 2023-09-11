<script setup>
import {reactive, ref, h, watch} from "vue";
import SectionMain from "@/components/SectionMain.vue";
import LayoutAuthenticated from "@/layouts/LayoutAuthenticated.vue";
import {DataTable} from "@/components";
import router from "@/router";
import {UseEloquentRouter} from "@/utils/UseEloquentRouter";
import {UseDataTable} from "@/utils/UseDataTable";

const prefix = router.currentRoute.value.meta.api ? router.currentRoute.value.meta.api : router.currentRoute.value.path
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
      router.replace(prefix + '/' + item.id)
    }
  },
  {
    label: 'Delete',
    class: 'font-medium text-red-600 dark:text-red-500 hover:underline',
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
      router.replace(prefix + '/new')
    }
  }
]
const columns = [
  {
    title: 'Hình ảnh',
    key: 'image',
    width: '100px'
  },
  {
    title: 'Title',
    key: 'title',

  },

  {
    title: 'Loại',
    key: 'type',
    width: 100
  },

  {
    title: 'Publish',
    key: 'status',
    width: 100

  },
  {
    title: 'Created at',
    key: 'created_at',
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
    <SectionMain>
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
          <a-image height="50px" class="w-20 h-auto" :src="item.image_url"
                   :alt="item.name"/>
        </template>


        <template #cell[status]="{item,column}">
          <a-switch @change="updateApi(item.id,{status:item.status})" checkedValue="publish" unCheckedValue="draft"
                    v-model:checked="item.status"/>
        </template>
      </DataTable>
    </SectionMain>
    <router-view></router-view>
  </LayoutAuthenticated>

</template>
