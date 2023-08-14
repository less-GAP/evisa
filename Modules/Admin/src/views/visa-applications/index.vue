<script setup>
import {reactive, ref, h} from "vue";
import {mdiBallotOutline, mdiAccount, mdiAccountMultiple, mdiMail, mdiGithub, mdiDelete, mdiEye} from "@mdi/js";
import SectionMain from "@/components/SectionMain.vue";
import CardBox from "@/components/CardBox.vue";
import FormCheckRadioGroup from "@/components/FormCheckRadioGroup.vue";
import FormFilePicker from "@/components/FormFilePicker.vue";
import FormField from "@/components/FormField.vue";
import FormControl from "@/components/FormControl.vue";
import BaseDivider from "@/components/BaseDivider.vue";
import BaseButton from "@/components/BaseButton.vue";
import BaseButtons from "@/components/BaseButtons.vue";
import SectionTitle from "@/components/SectionTitle.vue";
import LayoutAuthenticated from "@/layouts/LayoutAuthenticated.vue";
import SectionTitleLineWithButton from "@/components/SectionTitleLineWithButton.vue";
import NotificationBarInCard from "@/components/NotificationBarInCard.vue";
import {Modal, DataTable, BaseIcon} from "@/components";
import {DeleteOutlined} from '@ant-design/icons-vue';
import Api from "@/utils/Api";
import router from "@/router";
import ListView from "./ListView.vue";
import ViewDetail from "./ViewDetail.vue";
import {ProcessingTimes} from "@/views/visa-applications/meta";


const modalState = ref({
  visible: false,
  value: null,
  success: () => {
  },
  cancel: () => {
  },
});

function showModal(value, success) {
  modalState.value.visible = true;
  modalState.value.value = value;
  modalState.value.success = success;
}

const tableConfig = {
  tableConfig: {
    sticky: true,
    scroll: "{ x: 1500, y: 300 }",
    bordered: true,
    showHeader: true
  },
  api: (params) => Api.get('visa-application/list', {params}),
  addAction: (reload) => {
    showModal(null, reload)
  },
  itemActions: [
    // {
    //   label: 'View'
    //   , key: 'view'
    //   , icon: mdiEye
    //   , class: 'font-medium text-blue-600 dark:text-blue-500 hover:underline'
    //   , action(item, reload) {
    //     router.push('/users/' + item.id)
    //   }
    // },
    {
      label: 'Edit User'
      , key: 'edit'
      , class: 'font-medium text-blue-600 dark:text-blue-500 hover:underline'
      , action(item, reload) {
        showEditUser(item, reload)
      }
    },
    {
      label: ''
      , class: 'font-medium text-red-600 dark:text-red-500 hover:underline'
      , icon: mdiDelete
      , key: 'delete'
      , action(item, reload) {
        Api.delete('user/' + item.id).then(reload)
      }
    }

  ],
  columns: [
    {title: 'Username', width: 200, key: 'username'}
    , {title: 'Name', key: 'full_name'}
    , {title: 'Role', key: 'role'}
    , {title: 'Status', key: 'status'}
  ],
  selectionActions: [
    {
      title: 'Active',
      action(selectedKeys) {
        return Api.post('user/activeList', selectedKeys)
      }, complete() {
        alert('success')
      }
    }
    , {
      title: 'DeActive', action(selectedKeys) {
        return Api.post('user/activeList', selectedKeys)
      }, complete() {
        alert('success')
      }
    }
    , {
      title: 'Delete',
      action(selectedKeys) {
        return Api.post('user/deleteList', selectedKeys)
      },
      complete() {
        alert('success')
      }
    }
  ]
}

</script>

<template>
  <LayoutAuthenticated>
    <div class="sm:px-6 w-full">
      <!--- more free and premium Tailwind CSS components at https://tailwinduikit.com/ --->
      <div class="px-4 md:px-10 py-4 md:py-7">
        <div class="flex items-center justify-between">
          <p tabindex="0"
             class="focus:outline-none text-base sm:text-lg md:text-xl lg:text-2xl font-bold leading-normal text-gray-800">
            Visa Applications</p>
        </div>
      </div>

      <div class="bg-white py-4 md:py-7 px-4 md:px-8 xl:px-10">
        <DataTable v-bind="tableConfig">
          <template #header>
            <div class="flex w-full justify-between">
              <div class="flex items-center">
                <a class="rounded-full focus:outline-none focus:ring-2  focus:bg-indigo-50 focus:ring-indigo-800"
                   href=" javascript:void(0)">
                  <div class="py-2 px-8 bg-indigo-100 text-indigo-700 rounded-full">
                    <p>All</p>
                  </div>
                </a>
                <a
                  class="rounded-full focus:outline-none focus:ring-2 focus:bg-indigo-50 focus:ring-indigo-800 ml-4 sm:ml-8"
                  href="javascript:void(0)">
                  <div class="py-2 px-8 text-danger  hover:bg-indigo-100 rounded-full ">
                    <p>Pending</p>
                  </div>
                </a>
                <a
                  class="rounded-full focus:outline-none focus:ring-2 focus:bg-indigo-50 focus:ring-indigo-800 ml-4 sm:ml-8"
                  href="javascript:void(0)">
                  <div class="py-2 px-8 text-success hover:bg-indigo-100 rounded-full ">
                    <p>Done</p>
                  </div>
                </a>

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
    </div>


  </LayoutAuthenticated>
  <a-drawer :footer="null" width="90vw"
           v-model:open="modalState.visible">
    <ViewDetail v-if="modalState.visible"
              @success="modalState.visible=false;modalState.success()" @cancel="modalState.visible=false"
              :id="modalState.value.id"></ViewDetail>
  </a-drawer>
</template>
<style>.checkbox:checked + .check-icon {
  display: flex;
}
</style>
