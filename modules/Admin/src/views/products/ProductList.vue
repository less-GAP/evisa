<script setup>

  import {reactive, ref, h} from "vue";
  import Api from "@/utils/Api";
  import router from "@/router";
  import {mdiDelete} from "@mdi/js";

  import {DataTable} from "@/components";

  import {PlusOutlined, LoadingOutlined, DeleteOutlined, FormOutlined} from '@ant-design/icons-vue';


  const tableConfig = {
    api: (params) => Api.get('product/list', {params:{...params,type: 'product'}}),
    itemActions: [
      {
        label: '',
        class: 'font-medium text-blue-600 dark:text-blue-500 hover:underline',
        icon: mdiDelete,
        key: 'edit',
        action(item, reload) {
          //
        }
      },
    ],
    columns: [
      {
        title: 'Hình ảnh',
        key: 'image'
      },
      {
        title: 'Loại sản phẩm',
        key: 'type'
      },
      {
        title: 'Tên sản phẩm',
        key: 'name'
      },
      {
        title: 'Giá niêm yết',
        key: 'price',
        class: 'text-right'
      },
      {
        title: 'Giá sản phẩm',
        key: 'price',
        class: 'text-right'
      },
      {
        title: 'Điểm thưởng(Point)',
        key: 'point',
        class: 'text-right'
      },
      {
        title: 'Status',
        key: 'status'
      }
    ],
  }

</script>
<template>
  <DataTable v-bind="tableConfig">
    <template #cellAction[edit]="{item,actionMethod}">
      <a-button
        type="text"
        :icon="h(FormOutlined)"
        label=""
        :outline="true"
        @click="actionMethod"
      >
      </a-button>
    </template>
    <template #cell[image]="{item,column}">
      <img class="w-20 h-auto float-left rounded-full" :src="item.image_url"
           :alt="item.name"/>
    </template>
    <template #cell[type]="{item,column}">
      {{item.type == 'product' ? 'Sản phẩm' : 'Gói sản phẩm'}}
    </template>
    <template #cell[name]="{item,column}">
      {{item.name}}
    </template>
    <template #cell[price]="{item,column}">
      {{item.price}}
    </template>
    <template #cell[sale_price]="{item,column}">
      {{item.sale_price}}
    </template>
    <template #cell[status]="{item,column}">
      <div class="flex items-center" v-if="item.status == 'D'">
        <div class="h-2.5 w-2.5 rounded-full bg-red-500 mr-2"></div>
        Tắt
      </div>
      <div class="flex items-center" v-else>
        <div class="h-2.5 w-2.5 rounded-full bg-green-500 mr-2"></div>
        Hoạt động
      </div>
    </template>
  </DataTable>
</template>
