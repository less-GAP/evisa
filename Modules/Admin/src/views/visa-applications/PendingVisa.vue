<script setup>
import {reactive, ref, h, watch} from "vue";
import SectionMain from "@/components/SectionMain.vue";
import LayoutAuthenticated from "@/layouts/LayoutAuthenticated.vue";
import SectionTitleLineWithButton from "@/components/SectionTitleLineWithButton.vue";
import {DataTable} from "@/components";
import router from "@/router";
import {UseEloquentRouter} from "@/utils/UseEloquentRouter";
import {UseDataTable} from "@/utils/UseDataTable";

const prefix = 'visa-application'
const filter = {
  'status':router.currentRoute.value.params.status
}
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
      router.push(prefix + '/new')
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

</script>

<template>
    <div class="sm:px-6 w-full">
      <!--- more free and premium Tailwind CSS components at https://tailwinduikit.com/ --->

      <DataTable class="mt-5" v-bind="tableConfig">
        <template #header="{filter,reload}">
          <div class="flex w-full justify-between">
            <div class="flex items-center">


            </div>
            <span></span>
            <router-link to="/visa-applications/new"
                         class="focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600 mt-4 sm:mt-0 inline-flex items-start justify-start px-6 py-3 bg-indigo-700 hover:bg-indigo-600 focus:outline-none rounded">
              <p class="text-sm font-medium leading-none text-white">Add New</p>
            </router-link>
          </div>
        </template>
        <template #table="{tableData}">
          <div class="mt-7 overflow-x-auto">
            <table class="w-full whitespace-nowrap">
              <tbody>
              <template v-for="item in tableData.data" :key="item.id">
                <tr tabindex="0" class="focus:outline-none h-16 border border-gray-100 rounded">
                  <td class="">
                    <div class="flex items-center pl-5">
                      <p class="text-base font-medium leading-none text-gray-700 mr-2">{{ item.contact_name }}</p>

                      <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                             fill="none">
                          <path
                            d="M9.16667 2.5L16.6667 10C17.0911 10.4745 17.0911 11.1922 16.6667 11.6667L11.6667 16.6667C11.1922 17.0911 10.4745 17.0911 10 16.6667L2.5 9.16667V5.83333C2.5 3.99238 3.99238 2.5 5.83333 2.5H9.16667"
                            stroke="#52525B" stroke-width="1.25" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                          <circle cx="7.50004" cy="7.49967" r="1.66667" stroke="#52525B" stroke-width="1.25"
                                  stroke-linecap="round" stroke-linejoin="round"></circle>
                        </svg>
                        <p class="text-sm leading-none text-gray-600 ml-2">
                          {{ $format.formatNumber(item.total_amount) }} $</p>
                      </div>
                    </div>
                  </td>
                  <td class="pl-5">
                    <div class="flex items-center">
                      <BaseIcon :path="mdiAccountMultiple"></BaseIcon>
                      <p class="text-sm leading-none text-gray-600 ml-2">{{ item.number_of_visa }}</p>
                    </div>
                  </td>
                  <td class="pl-5">
                    <div class="flex items-center">
                      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                        <path
                          d="M3.33331 17.4998V6.6665C3.33331 6.00346 3.59671 5.36758 4.06555 4.89874C4.53439 4.4299 5.17027 4.1665 5.83331 4.1665H14.1666C14.8297 4.1665 15.4656 4.4299 15.9344 4.89874C16.4033 5.36758 16.6666 6.00346 16.6666 6.6665V11.6665C16.6666 12.3295 16.4033 12.9654 15.9344 13.4343C15.4656 13.9031 14.8297 14.1665 14.1666 14.1665H6.66665L3.33331 17.4998Z"
                          stroke="#52525B" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M10 9.1665V9.17484" stroke="#52525B" stroke-width="1.25" stroke-linecap="round"
                              stroke-linejoin="round"></path>
                        <path d="M6.66669 9.1665V9.17484" stroke="#52525B" stroke-width="1.25" stroke-linecap="round"
                              stroke-linejoin="round"></path>
                        <path d="M13.3333 9.1665V9.17484" stroke="#52525B" stroke-width="1.25" stroke-linecap="round"
                              stroke-linejoin="round"></path>
                      </svg>
                      <p class="text-sm leading-none text-gray-600 ml-2">{{ item.comment_count || 0 }}</p>
                    </div>
                  </td>
                  <td class="pl-5">
                    <a-tag v-if="!item.approval_status || item.approval_status == 'pending'" color="orange">Pending
                    </a-tag>
                    <a-tag v-if="item.approval_status == 'approved'" color="success">Approved
                    </a-tag>
                    <a-tag v-if="item.approval_status == 'rejected'" color="red">Rejected
                    </a-tag>
                    <a-tag v-if="!item.approval_status || item.approval_status == 'pending'" color="red">Due date:
                      {{ $format.formatDateTime(item.est_delivery_time) }}
                    </a-tag>
                  </td>
                  <td class="pl-4">
                    <a-button @click="showModal(item)" type="primary"
                              class="focus:ring-2 focus:ring-offset-2 focus:ring-red-300 text-sm leading-none text-gray-600 py-3 px-5 bg-gray-100 rounded hover:bg-gray-200 focus:outline-none">
                      View
                    </a-button>
                  </td>
                  <!--                    <td>-->
                  <!--                      <div class="relative px-5 pt-2">-->
                  <!--                        <button class="focus:ring-2 rounded-md focus:outline-none" onclick="dropdownFunction(this)"-->
                  <!--                                role="button" aria-label="option">-->
                  <!--                          <svg class="dropbtn" onclick="dropdownFunction(this)" xmlns="http://www.w3.org/2000/svg"-->
                  <!--                               width="20" height="20" viewBox="0 0 20 20" fill="none">-->
                  <!--                            <path-->
                  <!--                              d="M4.16667 10.8332C4.62691 10.8332 5 10.4601 5 9.99984C5 9.5396 4.62691 9.1665 4.16667 9.1665C3.70643 9.1665 3.33334 9.5396 3.33334 9.99984C3.33334 10.4601 3.70643 10.8332 4.16667 10.8332Z"-->
                  <!--                              stroke="#9CA3AF" stroke-width="1.25" stroke-linecap="round"-->
                  <!--                              stroke-linejoin="round"></path>-->
                  <!--                            <path-->
                  <!--                              d="M10 10.8332C10.4602 10.8332 10.8333 10.4601 10.8333 9.99984C10.8333 9.5396 10.4602 9.1665 10 9.1665C9.53976 9.1665 9.16666 9.5396 9.16666 9.99984C9.16666 10.4601 9.53976 10.8332 10 10.8332Z"-->
                  <!--                              stroke="#9CA3AF" stroke-width="1.25" stroke-linecap="round"-->
                  <!--                              stroke-linejoin="round"></path>-->
                  <!--                            <path-->
                  <!--                              d="M15.8333 10.8332C16.2936 10.8332 16.6667 10.4601 16.6667 9.99984C16.6667 9.5396 16.2936 9.1665 15.8333 9.1665C15.3731 9.1665 15 9.5396 15 9.99984C15 10.4601 15.3731 10.8332 15.8333 10.8332Z"-->
                  <!--                              stroke="#9CA3AF" stroke-width="1.25" stroke-linecap="round"-->
                  <!--                              stroke-linejoin="round"></path>-->
                  <!--                          </svg>-->
                  <!--                        </button>-->
                  <!--                        <div class="dropdown-content bg-white shadow w-24 absolute z-30 right-0 mr-6 hidden">-->
                  <!--                          <div tabindex="0"-->
                  <!--                               class="focus:outline-none focus:text-indigo-600 text-xs w-full hover:bg-indigo-700 py-4 px-4 cursor-pointer hover:text-white">-->
                  <!--                            <p>Edit</p>-->
                  <!--                          </div>-->
                  <!--                          <div tabindex="0"-->
                  <!--                               class="focus:outline-none focus:text-indigo-600 text-xs w-full hover:bg-indigo-700 py-4 px-4 cursor-pointer hover:text-white">-->
                  <!--                            <p>Delete</p>-->
                  <!--                          </div>-->
                  <!--                        </div>-->
                  <!--                      </div>-->
                  <!--                    </td>-->
                </tr>
                <tr class="h-3"></tr>
              </template>
              </tbody>
            </table>
          </div>
        </template>
      </DataTable>

    </div>

</template>
<style>.checkbox:checked + .check-icon {
  display: flex;
}
</style>
