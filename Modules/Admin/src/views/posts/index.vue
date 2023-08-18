<script setup>
import {reactive, ref, h} from "vue";
import {mdiBallotOutline, mdiDelete} from "@mdi/js";
import SectionMain from "@/components/SectionMain.vue";
import LayoutAuthenticated from "@/layouts/LayoutAuthenticated.vue";
import SectionTitleLineWithButton from "@/components/SectionTitleLineWithButton.vue";
import {Modal, DataTable} from "@/components";

import {PlusOutlined, LoadingOutlined, DeleteOutlined, FormOutlined} from '@ant-design/icons-vue';

import {InputUpload} from "@/components";

import Api from "@/utils/Api";
import router from "@/router";

import {notification} from "ant-design-vue";
import {fetchApi, tableConfig} from "./meta";

const isShowModal = ref(false)

const editProduct = ref(null);

function showEditUser(user, reload) {
  isShowModal.value = true;
  editProduct.value = user;
}


</script>

<template>
  <LayoutAuthenticated>
    <SectionMain>
      <DataTable v-bind="tableConfig">
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
          {{ item.type == 'product' ? 'Sản phẩm' : 'Gói sản phẩm' }}
        </template>
        <template #cell[name]="{item,column}">
          {{ item.name }}
        </template>
        <template #cell[price]="{item,column}">
          {{ $format.formatMoney(item.price) }}
        </template>
        <template #cell[sale_price]="{item,column}">
          {{ $format.formatMoney(item.sale_price) }}
        </template>
        <template #cell[point]="{item,column}">
          {{ $format.formatNumber(item.point) }}
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
    </SectionMain>
  </LayoutAuthenticated>

</template>
