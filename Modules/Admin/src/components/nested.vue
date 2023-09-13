<template>
  <draggable
    v-bind="$attrs"
    class="ant-table-tbody"
    tag="table"
    handle=".drag-handle"
    v-model="newValue"
    :group="{ name: 'g1' }"
    item-key="value"
  >
    <thead class="ant-table-thead">
    <tr>
      <th class="ant-table-cell ant-table-cell-ellipsis" v-class="column.class"
          v-for="(column,columnIndex) in getColumns()" :width="column.width" scope="col">
        <slot name="column" v-bind="{column}">
          <template v-if="column.dataIndex=='action'">
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

    <template #item="{ element ,index }">
      <tbody>

      <tr scope="row">
        <td :data-label="column.title" v-class="column.class" :width="column.width" v-for="(column) in columns">
            <span v-if="index==0">
            {{ column.title }}
            </span>
          <template v-if="column.dataIndex=='action'">
            <div style="white-space: nowrap">
              <a-button type="primary">
                <template #icon>
                  <DragOutlined class="drag-handle"></DragOutlined>
                </template>
              </a-button>
              <a-button @click="newValue.splice(index,1)" style="margin-left:5px" danger>
                <template #icon>
                  <DeleteOutlined></DeleteOutlined>
                </template>
              </a-button>
              <a-button v-if="nested" @click="element.children.push({})" style="margin-left:5px" success>
                <template #icon>
                  <PlusOutlined></PlusOutlined>
                </template>
              </a-button>
            </div>

          </template>
          <template v-else>
            <slot :name="'cell['+column.dataIndex+']'" v-bind="{item:element,column,index}">
              <a-input-number class="!w-full" v-bind="column.props" :min="column.min"
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
      <tr v-if="nested" class="border border-gray-100 ">
        <td></td>
        <td :colspan="columns.length-1">
          <nested-draggable :nested="nested-1" :columns="columns"
                            v-model:value="element.children"></nested-draggable>
        </td>
      </tr>
      </tbody>


    </template>
  </draggable>
</template>
<script>
import draggable from "vuedraggable";
import {ref, toRaw, watch} from "vue";
import {DragOutlined, DeleteOutlined, PlusOutlined} from '@ant-design/icons-vue';

export default {
  props: {
    value: {
      required: true,
      type: Array
    },
    columns: {
      required: true,
      type: Array
    },
    nested: {
      required: true,
      default: 1,
      type: Number
    }
  }, emits: ['options-change', 'update:value', 'change'],
  setup(props, {emit}) {
    const newValue = ref(toRaw(props.value));
    if (!Array.isArray(newValue.value)) {
      newValue.value = []
      emit('update:value', [])

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
    return {newValue}
  },
  components: {
    draggable,
    DragOutlined,
    DeleteOutlined,
    PlusOutlined
  }
  ,
  name: "nested-draggable"
}
;
</script>
<style scoped>
.dragArea {
  min-height: 50px;
  outline: 1px dashed;
}
</style>
