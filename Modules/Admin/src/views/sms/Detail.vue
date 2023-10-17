<script setup>
import { computed, ref, toRaw } from "vue";
import LayoutAuthenticated from "@/layouts/LayoutAuthenticated.vue";

import Api from "@/utils/Api";
import router from "@/router";

import { notification } from "ant-design-vue";

const formRef = ref();
const loading = ref(false)
const formState = ref({});
const customers = ref([]);

const fetch = function () {
  loading.value = true
  Api.get('customer/list').then(result => {
    // Object.assign(formState.lists, result.data.data)
    customers.value = result.data.data.map(item => {
      return {
        label: item.name + ' (' + item.phone + ')',
        value: item.phone
      }
    })
  }).catch(e => {
  }).finally(loading.value = false)
}
fetch();

const filteredOptions = computed(() => {
  return formState.value.lists ? customers.value.filter(o => !formState.value.lists.includes(o.value)) : customers.value
});

const onFinish = () => {
  loading.value = true;
  formRef.value
    .validate()
    .then(() => {
      Api.post('sms', toRaw(formState.value)).then(rs => {
        notification[rs.data.code == 0 ? 'error' : 'success']({
          message: 'Notification',
          description: rs.data.message,
        });
        if (rs.data.code == 1) {
          formState.value = {};
          loading.value = false;
          back();
        }
      });
    })
    .catch(error => {
      notification['error']({
        message: 'Notification',
        description: error,
      });
      loading.value = false;
    });
};

const back = () => {
  router.push('/sms');
};

</script>

<template>
  <LayoutAuthenticated>
      <a-form autocomplete="off" v-if="formState" layout="vertical" ref="formRef" :model="formState" @finish="onFinish">
        <a-form-item name="lists" label="User" :rules="[{ required: true, message: 'Please input your lists!' }]">
          <a-select mode="multiple" style="width: 100%" placeholder="Please select" v-model:value="formState.lists"
            :options="filteredOptions.map(item => ({
              value: item.value,
              label: item.label,
            }))" />
        </a-form-item>
        <a-form-item name="sms" label="SMS" :rules="[{ required: true, message: 'Please input your message!' }]">
          <a-textarea v-model:value="formState.sms" placeholder="Your SMS" :rows="4" />
        </a-form-item>
        <a-form-item>
          <a-space>
            <a-button type="primary" html-type="submit" :loading="loading">Submit</a-button>
            <a-button type="primary" ghost @click="back()">Back</a-button>
          </a-space>
        </a-form-item>
      </a-form>
  </LayoutAuthenticated>
</template>
