<script setup>
  import {computed, ref, h, toRaw} from "vue";
  import {useMainStore} from "@/stores/main";
  import {mdiEye, mdiTrashCan} from "@mdi/js";
  import {Button, Input, InputUpload} from "@/components/index";
  import BaseIcon from "@/components/BaseIcon.vue";
  import {DownOutlined, ReloadOutlined} from "@ant-design/icons-vue";

  const props = defineProps({
    tableConfig: {
      type: Object,
      default: {}
    },
    pagination: {
      type: Object,
      default: {
        page: 1,
        total: 0,
        perPage: 10
      }
    },
    showSizeChanger: {
      type: Boolean,
      default: true
    },
    params: {
      type: Object,
      default: {}
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
    addAction: Function,
  });
  const tableConfig = {
    item_key: 'id'
    , rowSelect: true
    , globalSearch: true
    , ...props.tableConfig
  }
  const tableData = ref({})
  const search = ref('')

  function reset() {
    props.pagination.page = 1
    reload()
  }

  const tableColumns = computed(() => {
    const result = props.columns.map(item => {
      return {
        dataIndex: item.dataIndex ? item.dataIndex : item.key,
        ...item
      }
    })
    if (props.itemActions.length) {
      result.push({
        title: 'Hành động',
        key: 'action',
        width: 150,
        dataIndex: 'action'
      })
    }
    return result;
  })

  function reload() {
    if (props.api) {
      loading.value = true
      props.api({
        perPage: props.pagination.perPage,
        page: props.pagination.page, ...props.params,
        "filter[search]": search.value
      }).then(rs => {
        tableData.value = rs.data
        props.pagination.total = rs.data?.total ? rs.data.total : 0
      }).finally(() => {
        checkAll.value = false
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

  const rowSelection = computed(() => {
    if (!props.selectionActions || !props.selectionActions.length) {
      return false;
    }
    return {
      onChange: (selectedRowKeys, selectedRows) => {
        console.log(`selectedRowKeys: ${selectedRowKeys}`, 'selectedRows: ', selectedRows);
      },
      getCheckboxProps: (record) => ({
        disabled: record.name === 'Disabled User', // Column configuration not to be checked
        name: record.name,
      }),
    };
  })
  reload()
</script>

<template>
  <div class="relative text-center overflow-x-auto sm:rounded-lg">

    <div :loading="loading" class="flex items-center justify-between  bg-white dark:bg-gray-800">
      <a-space>

        <a-input
          v-if="tableConfig.globalSearch"
          allow-clear
          @search="reload"
          @keyup.enter="reload"
          style="max-width: 300px"
          v-model:value="search"
          placeholder="Enter to search..."
          :loading="loading"
        />
        <slot name="filter"></slot>
      </a-space>
      <span></span>

      <a-space>
        <a-button>
          <template #icon>
            <reload-outlined @click="reload"/>
          </template>
        </a-button>
        <a-dropdown v-if="selectionActions.length > 0" :disabled="!selectedItems.length">
          <template #overlay>
            <a-menu>
              <a-menu-item @click="doSelectionAction(action)" :key="index" v-for="(action,index) in selectionActions"
              >
                {{ action.title }}
              </a-menu-item>

            </a-menu>
          </template>
          <a-button>
            Hành động
            <DownOutlined/>
          </a-button>
        </a-dropdown>

        <a-button type="primary" v-if="addAction" @click="()=>{addAction(reload)}">Thêm mới</a-button>

      </a-space>
    </div>
    <a-table v-bind="tableConfig" :row-selection="rowSelection" class="mt-12" v-if="tableData.data?.length" :pagination="false"
             :data-source="tableData.data" :columns="tableColumns">
      <template #bodyCell="{ text ,record, column }">
        <slot :name="'cell['+column.key+']'" v-bind="{item:record,column,index}">
          {{ $style['format'][column.key] ? $style['format'][column.key](record[column.key]) : record[column.key] }}
        </slot>
        <template v-if="column.key == 'action'" fixed="right">
          <template v-for="itemAction in itemActions">
            <slot :name="'cellAction['+itemAction.key+']'"
                  v-bind="{item:record ,itemAction, actionMethod(){itemAction.action(record,reload)}}">
              <a-button
                @click="itemAction.action(record,reload)"
                :class="itemAction.class ||'font-medium text-blue-600 dark:text-blue-500 hover:underline'"
                type="link"
              >
                {{ itemAction.label }}
              </a-button>
            </slot>
          </template>
        </template>
      </template>
    </a-table>
    <a-empty v-else/>
    <br>
    <a-pagination v-if="pagination?.total" :showSizeChanger="showSizeChanger" @change="reload"
                  v-model:current="pagination.page"
                  v-model:pageSize="pagination.perPage" :total="pagination.total">
      <template #itemRender="{ type, originalElement }">
        <a v-if="type === 'prev'">Previous</a>
        <a v-else-if="type === 'next'">Next</a>
        <component :is="originalElement" v-else></component>
      </template>
    </a-pagination>
    <!--    <table v-if="tableData.data?.length" class="w-full text-sm text-left text-gray-500 dark:text-gray-400 mt-5">-->
    <!--      <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">-->
    <!--      <tr>-->
    <!--        <th v-if="config.rowSelect" scope="col" class="p-4">-->
    <!--          <div class="flex items-center">-->
    <!--            <div class="flex items-center pl-4  border-gray-200 rounded dark:border-gray-700">-->
    <!--              <label-->
    <!--                class="w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"> <input-->
    <!--                @change="toggleCheckAll" :value="true" v-model="checkAll" type="checkbox"-->
    <!--                class="w-4 h-4 text-blue-600 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">-->
    <!--              </label>-->
    <!--            </div>-->
    <!--          </div>-->
    <!--        </th>-->

    <!--        <th v-for="column in columns" scope="col" class="px-6 py-3">-->
    <!--          {{ __(column.title) }}-->
    <!--        </th>-->

    <!--        <th v-if="itemActions.length" scope="col" class="px-6 py-3">-->
    <!--          {{ __('Action') }}-->

    <!--        </th>-->
    <!--      </tr>-->
    <!--      </thead>-->
    <!--      <tbody>-->
    <!--      <tr v-for="(item,index) in tableData.data" :key="item[config.item_key]" v-bind:class="{'border-b':(index%2===0)}"-->
    <!--          class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">-->
    <!--        <td v-if="config.rowSelect" class="w-4 p-4">-->
    <!--          <div class="flex items-center">-->
    <!--            <div class="flex items-center pl-4  border-gray-200 rounded dark:border-gray-700">-->
    <!--              <label :for="'checkbox-table-search-'+item[config.item_key]"-->
    <!--                     class="w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"> <input-->
    <!--                v-model="selectedItems" :id="item[config.item_key]" :value="item" type="checkbox"-->
    <!--                class="w-4 h-4 text-blue-600 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">-->
    <!--              </label>-->
    <!--            </div>-->
    <!--          </div>-->
    <!--        </td>-->

    <!--        <td v-for="column in columns"-->
    <!--            :class="'px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white ' + (column.class ? column.class : '')">-->
    <!--          <slot :name="'cell['+column.key+']'" v-bind="{item,column,index}">-->
    <!--            {{ $style['format'][column.key] ? $style['format'][column.key](item[column.key]) : item[column.key] }}-->
    <!--          </slot>-->

    <!--        </td>-->
    <!--        <td v-if="itemActions.length" class="px-6 item-actions py-2">-->
    <!--          &lt;!&ndash; Modal toggle &ndash;&gt;-->
    <!--          <template v-for="itemAction in itemActions">-->
    <!--            <slot :name="'cellAction['+itemAction.key+']'"-->
    <!--                  v-bind="{item ,itemAction, actionMethod(){itemAction.action(item,reload)}}">-->
    <!--              <a-button-->
    <!--                @click="itemAction.action(item,reload)"-->
    <!--                :class="itemAction.class ||'font-medium text-blue-600 dark:text-blue-500 hover:underline'"-->
    <!--                type="link"-->
    <!--              >-->
    <!--                {{ itemAction.label }}-->
    <!--              </a-button>-->

    <!--            </slot>-->
    <!--          </template>-->
    <!--        </td>-->
    <!--      </tr>-->
    <!--      </tbody>-->
    <!--    </table>-->

  </div>
</template>
<style scoped>
  .item-actions > :not(:first-child) {
    margin-left: 10px
  }
</style>
