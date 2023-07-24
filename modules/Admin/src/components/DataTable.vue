<script setup>
import {computed, ref, h, toRaw} from "vue";
import {useMainStore} from "@/stores/main";
import {mdiEye, mdiTrashCan} from "@mdi/js";
import {Button, Input} from "@/components/index";
import BaseIcon from "@/components/BaseIcon.vue";

const props = defineProps({
  config: {
    type: Object,
    default: {
      item_key: 'id'
      , rowSelect: true
    }
  },
  params: {
    type: Object,
    default: {
      search: ''
    }
  },
  columns: Array,
  selectionActions: {
    type: Array,
    default: []
  },
  itemActions: {
    type: Array,
    default: []
  },
  api: Function,
});
const tableConfig = {
  item_key: 'id'
  , rowSelect: true
  , ...props.config
}
const tableData = ref({})

function reload() {
  if (props.api) {
    loading.value = true
    props.api(props.params).then(rs => {
      tableData.value = rs.data
    }).finally(() => {
      loading.value = false
    })
  }
}

const loading = ref(false);
const checkAll = ref(false);
const selectedKeys = ref([])
const selectedItems = ref([])

async function doSelectionAction(action) {
  const selectedKeys = selectedItems.value.map(item => item[tableConfig.item_key])
  await (action.action(selectedKeys, selectedItems.value))
  if (action.complete) {
    action.complete()
  }
  selectedItems.value = []
  reload()
}

function toggleCheckAll() {
  if (checkAll.value) {
    selectedItems.value = toRaw(tableData?.value.data || [])
  } else {
    selectedItems.value = []
  }
}

reload()

</script>

<template>
  <div class="relative text-center overflow-x-auto sm:rounded-lg">
    <div class="absolute w-full h-full text-center" v-show="loading" role="status">
      <svg aria-hidden="true" class="inline w-8 h-8 mr-2 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600"
           viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path
          d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
          fill="currentColor"/>
        <path
          d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
          fill="currentFill"/>
      </svg>
      <span class="sr-only">Loading...</span>
    </div>
    <div :loading="loading" class="flex items-center justify-between py-4 bg-white dark:bg-gray-800">
      <label for="table-search" class="sr-only">Search</label>
      <div class="relative w-2/5">
        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
          <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
               fill="none" viewBox="0 0 20 20">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
          </svg>
        </div>
        <Input size="md" @keyup.enter="reload" v-model="params.search" placeholder="Search...">
          <template #prefix>
            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor"
                 viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
            </svg>
          </template>

        </Input>

      </div>
      <div>

        <button size="lg" id="dropdownActionButton" data-dropdown-toggle="dropdownAction"
                class="inline-flex mr-3 items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-lg px-3 py-1.5 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
                type="button">
          <span class="sr-only">Action button</span>
          Action
          <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
               viewBox="0 0 10 6">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="m1 1 4 4 4-4"/>
          </svg>
        </button>
        <!-- Dropdown menu -->
        <div id="dropdownAction"
             class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
          <ul class="py-1 text-gray-700 dark:text-gray-200" aria-labelledby="dropdownActionButton">
            <li v-for="action in selectionActions">
              <button color="light" :disabled="!selectedItems.length" @click="doSelectionAction(action)"
                      class="block w-full cursor-pointer text-left disabled:opacity-25 px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                {{
                  __(action.title)
                }}
              </button>
            </li>
          </ul>

        </div>
        <Button size="lg" @click="reload">Add</Button>

      </div>

    </div>
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
      <tr>
        <th v-if="config.rowSelect" scope="col" class="p-4">
          <div class="flex items-center">
            <div class="flex items-center pl-4  border-gray-200 rounded dark:border-gray-700">
              <label
                class="w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"> <input
                @change="toggleCheckAll" :value="true" v-model="checkAll" type="checkbox"
                class="w-4 h-4 text-blue-600 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
              </label>
            </div>
          </div>
        </th>

        <th v-for="column in columns" scope="col" class="px-6 py-3">
          {{ __(column.title) }}
        </th>

        <th v-if="itemActions.length" scope="col" class="px-6 py-3">
          {{ __('Action') }}
        </th>
      </tr>
      </thead>
      <tbody>
      <tr v-for="(item,index) in tableData.data" :key="item[config.item_key]" v-bind:class="{'border-b':(index%2===0)}"
          class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
        <td v-if="config.rowSelect" class="w-4 p-4">
          <div class="flex items-center">
            <div class="flex items-center pl-4  border-gray-200 rounded dark:border-gray-700">
              <label :for="'checkbox-table-search-'+item[config.item_key]"
                     class="w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"> <input
                v-model="selectedItems" :id="item[config.item_key]" :value="item" type="checkbox"
                class="w-4 h-4 text-blue-600 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
              </label>
            </div>
          </div>
        </td>

        <td v-for="column in columns"
            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
          <slot :name="'cell['+column.key+']'" v-bind="{item,column,index}">
            {{ item[column.key] }}
          </slot>

        </td>
        <td v-if="itemActions.length" class="px-6 item-actions py-4">
          <!-- Modal toggle -->
          <template v-for="itemAction in itemActions">
            <slot :name="'cellAction['+itemAction.key+']'"
                  v-bind="{item ,itemAction, actionMethod(){itemAction.action(item,reload)}}">
              <a-button
                @click="itemAction.action(item,reload)"
                :class="itemAction.class ||
          'font-medium text-blue-600 dark:text-blue-500 hover:underline'"
                type="link"
              >
                {{itemAction.label}}
              </a-button>

            </slot>
          </template>
        </td>
      </tr>
      </tbody>
    </table>
  </div>
</template>
<style scoped>
.item-actions > :not(:first-child) {
  margin-left: 10px
}
</style>
