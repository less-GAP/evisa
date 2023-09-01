<script lang="ts" setup>
import {reactive, h, ref, toRaw, computed} from "vue";
import {CloseCircleOutlined, ArrowLeftOutlined} from '@ant-design/icons-vue';
import router from "@/router";
import {UseEloquentRouter} from "@/utils/UseEloquentRouter";
import ApiData from "@/components/ApiData.vue";

const prefix = 'customer'
const {
  fetchDetailApi,
  createApi,
  // updateApi
} = UseEloquentRouter(prefix)

const loading = ref(false);

const formRef = ref();


const formState = reactive({
  isNew: true,
  full_name: "",
  username: "",
  email: "",
  role: "user",
  password: "",
});

const fetch = async function () {
  loading.value = true;
  var id = router.currentRoute.value.params.id;
  if (id !== 'new') {
    loading.value = true
    const value = await fetchDetailApi(id)
    Object.assign(formState, value.data)
    loading.value = false
  } else {
    loading.value = false
  }
}
fetch();


const submit = () => {
  formRef.value
    .validate()
    .then(() => {
      createApi({...formState}).then(rs => {
        Object.assign(formState, rs.data.result)
      });
    })
};
const closeDetail = function () {
  router.replace({path: '/'+prefix})
}

</script>

<template>
  <a-drawer :closable="false" style="position:relative;display:flex;flex-direction:column;height:100vh;"
            @close="closeDetail" :open="true" width="80vw">
    <a-form
      autocomplete="off"
      v-bind="$config.formConfig"
      @finish="submit"
    >
      <div style="height:50px;"
           class=" ">
        <a-button class="float-left" type="link" @click="closeDetail">
          <template #icon>
            <ArrowLeftOutlined/>
          </template>
        </a-button>
        <a-space class="float-right" align="right">
          <!--                <a-button v-if="formState.rule_detect_category_link" @click="detectCategory" :loading="loadingDraft" >Test Category</a-button>-->
          <a-button @click="submit()" :loading="loading" type="primary">Save</a-button>
        </a-space>
      </div>
      <a-form-item name="username" label="UserName" :rules="[{ required: true }]">
        <a-input autocomplete="off" v-model:value="formState.username"/>
      </a-form-item>
      <a-form-item name="full_name" label="Full Name" :rules="[{ required: true }]">
        <a-input v-model:value="formState.full_name"/>
      </a-form-item>
      <a-form-item name="email" label="Email" :rules="[{ type: 'email',required: true  }]">
        <a-input v-model:value="formState.email"/>
      </a-form-item>
      <a-form-item label="Role" name="role">
        <a-radio-group v-model:value="formState.role">
          <a-radio value="user" name="type">User</a-radio>
          <a-radio value="admin" name="type">Admin</a-radio>
        </a-radio-group>
      </a-form-item>
      <a-form-item
        label="Password"
        name="password"
        :rules="formState.isNew?[{ required: true, message: 'Please input your password!' }]:[]"
      >
        <a-input-password autocomplete="off" v-model:value="formState.password">
          <template #prefix>
            <LockOutlined class="site-form-item-icon"/>
          </template>
        </a-input-password>
      </a-form-item>


    </a-form>
  </a-drawer>
</template>
