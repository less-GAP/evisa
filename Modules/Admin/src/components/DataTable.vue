<script setup>
import {computed, ref, h, toRaw} from "vue";
import {useMainStore} from "@/stores/main";
import {mdiEye, mdiTrashCan} from "@mdi/js";
import {Button, Input, InputUpload} from "@/components/index";
import BaseIcon from "@/components/BaseIcon.vue";
import {DownOutlined, ReloadOutlined, SearchOutlined, DragOutlined} from "@ant-design/icons-vue";
import draggable from "vuedraggable";

const emit = defineEmits(["register"]);

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
      perPage: 20
    }
  },
  showSizeChanger: {
    type: Boolean,
    default: true
  },
  showReload: {
    type: Boolean,
    default: false
  },
  showSelection: {
    type: Boolean,
    default: true
  },
  showSort: {
    type: [Boolean, Array],
    default: false
  },
  showPagination: {
    type: [Boolean],
    default: true
  },
  params: {
    type: Object,
    default: {}
  },
  sort: {
    type: String,
    default: '-id'
  },
  filter: {
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
  listActions: {
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
const data = ref(null)
const filter = ref({
  search: '',
  ...props.filter
})
const orderBy = ref(props.sort)

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
  if (props.actionColumn && props.itemActions.length) {
    result.push({
      title: 'Actions',
      key: 'action',
      dataIndex: 'action'
    })
  }
  return result;
})

function getFilter() {
  let rs = {}
  for (let filterKey in filter.value) {
    rs['filter[' + filterKey + ']'] = filter.value[filterKey]
  }
  return rs
}

function reload() {
  if (props.api) {
    loading.value = true
    props.api({
      perPage: props.pagination.perPage,
      sort: orderBy.value,
      page: props.pagination.page, ...props.params,
      ...getFilter()
    }).then(rs => {
      if (rs.data?.total) {
        tableData.value = rs.data
        data.value = rs.data.data
        props.pagination.total = rs.data?.total ? rs.data.total : 0
      } else {
        data.value = rs.data
      }
    }).finally(() => {
      checkAll.value = false
      loading.value = false
    })
  }
}

emit('register', {reload, filter})
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
    selectedItems.value = toRaw(data || [])
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
const dragOptions = {
  animation: 200,
  group: "description",
  disabled: false,
  ghostClass: "ghost"
}
const checkMove = function (evt) {
  evt.draggedContext.element.order = evt.draggedContext.futureIndex
  evt.relatedContext.element.order = evt.draggedContext.index
  emit('order', evt.draggedContext.element, evt.draggedContext.futureIndex)
  emit('order', evt.relatedContext.element, evt.draggedContext.index)
}
reload()
</script>

<template>
  <div class="flex flex-col sm:rounded-lg" id="table-list">
    <slot name="header" v-bind="{tableConfig,filter,reload}">
    </slot>

    <div :loading="loading" class="flex items-center p-2 justify-between bg-white rounded-xl">

      <a-space>

        <a-input-search
          v-if="tableConfig.globalSearch"
          allow-clear
          @search="reload"
          @keyup.enter="reload"
          style="max-width: 300px"
          v-model:value="filter.search"
          placeholder="Enter to search..."
          :loading="loading"
        />
        <a-button v-if="showReload">
          <template #icon>
            <reload-outlined @click="reload"/>
          </template>
        </a-button>
        <slot name="filter" v-bind="{tableConfig,filter,reload}"></slot>
        <slot name="sort" v-bind="{tableConfig,sort,filter,reload}">

        </slot>

      </a-space>
      <span></span>

      <a-space>
        <a-button v-for="listAction in listActions" type="primary"
                  @click="()=>{listAction.action(reload)}">{{ listAction.label }}
        </a-button>
        <slot name="action" v-bind="{selectedItems,data,reload}"></slot>
      </a-space>
    </div>
    <div class="overflow-hidden scroll-smooth flex-1 w-full bg-white shadow rounded-lg my-5">
      <a-skeleton active class="p-10" v-if="loading"/>
      <slot v-else name="table" v-bind="{tableConfig,tableData,data,columns,selectionActions,reload}">

        <table class="table-auto w-full">
          <thead class="text-xs font-semibold  uppercase bg-gray-700 text-white">
          <tr>
            <th v-if="showSelection" width="30" scope="col"
                class="p-2 whitespace-nowrap">
              <label
                class="w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"> <input
                @change="toggleCheckAll" :value="true" v-model="checkAll" type="checkbox"
                class="w-4 h-4 text-blue-600 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
              </label>
            </th>
            <th v-if="showSort" width="30" scope="col"
                class="p-2 whitespace-nowrap">
              #
            </th>

            <th v-for="column in columns" scope="col" :width="column.width?column.width:'auto'"
                class="p-2 whitespace-nowrap">
              <div class="font-semibold text-left">
                {{ __(column.title) }}
              </div>
            </th>

            <th v-if="itemActions.length" :width="itemActions.length*80" scope="col"
                class="p-2 text-center whitespace-nowrap">
              {{ __('Action') }}
            </th>
          </tr>
          </thead>
          <draggable :move="checkMove" v-if="data && data.length" v-bind="dragOptions" v-model="data" itemKey="value"
                     class="ant-table-tbody text-sm divide-y divide-gray-100" item-key="id"
                     handle=".drag-handle"
                     tag="tbody">
            <template #item="{ element:item ,index }">

              <tr :key="item[tableConfig.item_key]"
                  v-bind:class="{'border-b':(index%2===0)}">
                <td v-if="showSelection" class="p-2 whitespace-nowrap">
                  <label :for="'checkbox-table-search-'+item[tableConfig.item_key]"
                         class="w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"> <input
                    v-model="selectedItems" :id="item[tableConfig.item_key]" :value="item" type="checkbox"
                    class="w-4 h-4 text-blue-600 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                  </label>
                </td>
                <td v-if="showSort" class="p-2 whitespace-nowrap">
                  <a-button type="primary" class="mr-1" primary>
                    <template #icon>
                      <DragOutlined class="drag-handle"></DragOutlined>
                    </template>
                  </a-button>
                  {{ index + 1 }}
                </td>

                <td :data-label="column.title" v-for="column in columns"
                    :class="'p-2  whitespace-nowrap ' + (column.class ? column.class : '')">
                  <template v-if="item.render">
                    {{ item.render(item) }}
                  </template>
                  <slot v-else-if="column.format" :name="'cell['+column.key+']'" v-bind="{item,column,index}">
                    {{ column.format(item[column.key]) }}
                  </slot>
                  <slot v-else :name="'cell['+column.key+']'" v-bind="{item,column,index}">
                    {{
                      $style['format'][column.key] ? $style['format'][column.key](item[column.key]) : item[column.key]
                    }}
                  </slot>

                </td>
                <td v-if="itemActions.length " class="flex flex-wrap justify-center p-2 whitespace-nowrap">
                  <!-- Modal toggle -->
                  <template v-for="itemAction in itemActions">
                    <slot :name="'cellAction['+itemAction.key+']'"
                          v-bind="{item ,itemAction, actionMethod(){itemAction.action(item,reload)}}">
                      <a-popconfirm v-if="itemAction.confirm" @confirm="itemAction.action(item,reload)"
                                    title="Are you sure？">
                        <a-button
                          :class="itemAction.class?itemAction.class :'font-medium text-blue-600 dark:text-blue-500 hover:underline'"
                          type="link"
                        >
                          {{ itemAction.label }}
                        </a-button>
                      </a-popconfirm>
                      <a-button
                        v-else
                        @click="itemAction.action(item,reload)"
                        :class="itemAction.class?itemAction.class :'font-medium text-blue-600 dark:text-blue-500 hover:underline'"
                        type="link"
                      >
                        {{ itemAction.label }}
                      </a-button>

                    </slot>
                  </template>
                </td>
              </tr>
            </template>
          </draggable>
        </table>
      </slot>
      <a-empty class="my-10" :description="false" v-if="data?.length === 0 && pagination.total ===0"/>
    </div>

    <a-pagination style="height:40px" class="pt-2"
                  v-if="showPagination&&data && pagination?.total >pagination.perPage"
                  :showSizeChanger="showSizeChanger"
                  @change="reload"
                  v-model:current="pagination.page"
                  v-model:pageSize="pagination.perPage" :total="pagination.total">
      <template #itemRender="{ type, originalElement }">
        <a v-if="type === 'prev'">Previous</a>
        <a v-else-if="type === 'next'">Next</a>
        <component :is="originalElement" v-else></component>
      </template>
    </a-pagination>
    <!--    <table v-if="tableData.data?.length" class="w-full mt-5 text-sm text-left text-gray-500 dark:text-gray-400">-->
    <!--      <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">-->
    <!--      <tr>-->
    <!--        <th v-if="config.rowSelect" scope="col" class="p-4">-->
    <!--          <div class="flex items-center">-->
    <!--            <div class="flex items-center pl-4 border-gray-200 rounded dark:border-gray-700">-->
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
    <!--            <div class="flex items-center pl-4 border-gray-200 rounded dark:border-gray-700">-->
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
    <!--        <td v-if="itemActions.length" class="px-6 py-2 item-actions">-->
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
