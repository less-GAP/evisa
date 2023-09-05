<template>
  <div style="margin-bottom:15px">
    <a-button style="margin-right:15px" v-if="editColumn" @click="showAddColumn =true;columnForm={}" type="primary">{{
        __('Add Column')
      }}
    </a-button>

  </div>
  <div
    class="ant-table ant-table-ping-right ant-table-layout-fixed ant-table-fixed-header ant-table-fixed-column ant-table-scroll-horizontal ant-table-has-fix-right ant-table-small ant-table-bordered">
    <div class="ant-table-container">
      <table>
        <thead class="ant-table-thead">
        <tr>
          <th class="ant-table-cell ant-table-cell-ellipsis" v-class="column.class"
              v-for="(column,columnIndex) in getColumns()" scope="col">
            <slot name="column" v-bind="{column}">
              <template v-if="column.dataIndex=='action'">
                <a-button @click="newValue.push({})">
                  <template #icon>
                    <PlusOutlined></PlusOutlined>
                  </template>
                  {{ __('Add Row') }}
                </a-button>
              </template>
              <template v-else>
                {{ column.title }}
                <a-button size="small" v-if="editColumn && column.dataIndex !=='action'"
                          @click="columns.splice((columnIndex-1),1)" style="float:right" type="link" danger>
                  <template #icon>
                    <BaseIcon icon="ion:remove-outline"></BaseIcon>
                  </template>
                </a-button>
              </template>
            </slot>
          </th>
        </tr>
        </thead>
        <draggable v-bind="dragOptions" v-model="newValue" itemKey="value" class="ant-table-tbody" handle=".drag-handle"
                   tag="tbody">
          <template #item="{ element ,index }">
            <tr class="ant-table-measure-row">
              <td :data-label="column.title" v-for="column in getColumns()" scope="row">
                <template v-if="column.dataIndex=='action'">
                  <div style="width:100px">

                    <a-button type="link" primary>
                      <template #icon>
                        <DragOutlined class="drag-handle"></DragOutlined>
                      </template>
                    </a-button>

                    <a-button @click="newValue.splice(index,1)" style="margin-left:10px" type="link" danger>
                      <template #icon>
                        <DeleteOutlined></DeleteOutlined>
                      </template>
                    </a-button>
                  </div>

                </template>
                <template v-else>
                  <slot :name="'bodyCell['+column.dataIndex+']'" v-bind="{record:element,column}">
                    <a-input-number v-bind="column.props" :min="column.min"
                                    :formatter="value => `${value}`.replace(/\B(?=(\d{3})+(?!\d))/g, ',')"
                                    :parser="value => value.replace(/\$\s?|(,*)/g, '')" v-if="column.type =='number'"
                                    v-model:value="element[column.dataIndex]"></a-input-number>
                    <a-switch v-bind="column.props" v-else-if="column.type =='switch'"
                              v-model:checked="element[column.dataIndex]"></a-switch>
                    <component :is="column.component" v-bind="column.props" v-else-if="column.type =='component'"
                               v-model:value="element[column.dataIndex]"></component>
                    <a-input v-bind="column.props" v-else v-model:value="element[column.dataIndex]"></a-input>
                  </slot>
                </template>
              </td>
            </tr>
          </template>
        </draggable>

      </table>
    </div>

  </div>

  <a-modal
    title="Add Column"
    v-model:visible="showAddColumn"
    @ok="addColumn"
  >
    <a-form style="margin:20px" ref="formRef" :model="columnForm" layout="vertical" name="form_in_modal">
      <a-form-item
        name="key"
        label="Column Key"
        :rules="[{ required: true, message: 'Please input group name!' }]"
      >
        <a-input v-model:value="columnForm.dataIndex"/>
      </a-form-item>
    </a-form>

  </a-modal>
</template>

<script lang="ts">
import {computed, defineComponent, watch, ref, onMounted, unref, toRaw} from 'vue';
import {isArray, isFunction} from '@/utils/is';
import {DragOutlined, DeleteOutlined, PlusOutlined} from '@ant-design/icons-vue';
import draggable from "vuedraggable";
import BaseIcon from "./BaseIcon.vue";
import type {FormInstance} from "ant-design-vue";

export default defineComponent({
  components: {draggable, DragOutlined, DeleteOutlined, PlusOutlined, BaseIcon},
  props: {
    value: Array,
    columns: Array,
    editColumn: Boolean,
  },
  emits: ['options-change', 'update:value', 'change'],
  setup(props, {emit}) {
    const isFirstLoaded = ref<Boolean>(false);
    const loading = ref(false);
    const showAddColumn = ref(false);
    const columnForm = ref({});
    const newValue = ref(toRaw(props.value));
    const formRef = ref<FormInstance>();

    if (!props.value) {
      props.value = []
      emit('update:value', [])
    }
    if (!Array.isArray(newValue.value)) {
      newValue.value = []
    }

    function handleChange(...args) {
      emit('change', ...args);
    }

    watch(
      () => newValue.value,
      (value) => {
        emit('update:value', value)
      },
      {deep: true},
    );
    watch(
      () => props.value,
      (value) => {
        newValue.value = value
      },
      {deep: true},
    );


    return {

      getColumns() {
        if (!props.columns) {
          return []
        }
        return [{
          title: '',
          dataIndex: 'action',
          width: 100,
          class: 'w-[70px]'
        }].concat(props.columns)
      },
      addColumn() {
        formRef.value
          .validateFields()
          .then(value => {
            showAddColumn.value = false;
            if (!props.columns) {
              props.columns = []
            }
            props.columns.push({title: value.dataIndex, dataIndex: value.dataIndex});
            formRef.value.resetFields();
          })

      },
      changeColumn(a, b) {
        console.log(a, b)
      },
      dragOptions: {
        animation: 200,
        group: "description",
        disabled: false,
        ghostClass: "ghost"
      },
      loading,
      showAddColumn,
      columnForm,
      formRef,
      newValue,
      handleChange
    };
  },
});
</script>

<style>


.flip-list-move {
  transition: transform 0.5s;
}

.no-move {
  transition: transform 0s;
}

.ghost {
  opacity: 0.5;
  background: #ddd;
}

.list-group {
  min-height: 20px;
}

.list-group-item {
  cursor: move;
}

.list-group-item i {
  cursor: pointer;
}
</style>
