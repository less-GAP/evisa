<script setup>
  import {reactive, ref} from "vue";
  import {message} from 'ant-design-vue';

  import Api from "@/utils/Api";
  import validateMessages from "@/utils/validateMessages";
  import {InputUpload, InputUploadGetPath} from "@/components";
  import draggable from "vuedraggable";

  // export default {
  //   components: {
  //     draggable
  //   }
  // }

  const lists = reactive({
    list1 : [
      { key: 'info', name: "Info" },
      { key: 'title', name: "Title" },
      { key: 'slug', name: "Slug" },
      { key: 'status', name: "Status" }
    ],
    list2 : [
      { key: 'id', name: "ID", disable: true },
      { key: 'name', name: "Name" },
      { key: 'code', name: "Code" },
      { key: 'email', name: "Email" },
      { key: 'phone', name: "Phone" },
      { key: 'address', name: "Address" },
      { key: 'action', name: "Action", disable: true }
    ]
  });


  const configNames = [
    'per_page', 
    'table_columns'
  ]

  const emit = defineEmits(["success", "cancel"]);
  const loading = ref(false)
  const error = ref(null)
  const formState = reactive({
    per_page: 20
  });
  const formConfig = reactive({
    "validateTrigger": "submit",
    "label-align": "top",
    "model": formState,
    labelCol: {span: 24},
    wrapperCol: {span: 24},
    "validate-messages": validateMessages,
  });
  const fetch = function () {
    loading.value = true
    Api.get('config', {params: {names: configNames}}).then(result => {
      Object.assign(formState, result.data)
    }).catch(e => {
    }).finally(loading.value = false)
  }
  fetch();
  const submit = async function () {
    loading.value = true
    Api.post('config', formState).then(result => {
      emit('success', result)
    }).catch(e => {
    }).finally(loading.value = false)
  }

  const cancel = function () {
    emit('cancel')
  }

  const updateList = function (evt) {
    // Update list1
    lists.list1.splice(evt.newIndex, 0, lists.list1.splice(evt.oldIndex, 1)[0]);
    // Update list2
    lists.list2.splice(evt.oldIndex, 0, lists.list2.splice(evt.newIndex, 1)[0]);
    // console.log(lists.list1)
    // console.log(lists.list2)
  }

</script>

<template>

  <a-form
    autocomplete="off"
    v-bind="formConfig"
    @finish="submit"
  >
   
    <a-form-item name="per_page" label="Per Page" :rules="[{ required: true }]">
      <a-input-number v-model:value="formState.per_page" size="large" :min="1" :max="1000"  />
    </a-form-item>

    <div class="flex space-x-5 mb-5">
      <div class="w-auto">
        <h3 class="p-2 border-2 border-gray-300 border-b-1 font-bold bg-gray-100">Table columns</h3>
        <draggable class="border border-gray-300 list-group border-b-0" :list="lists.list1" group="people" @change="updateList" item-key="key">
          <template #item="{ element }">
            <div class="list-group-item border-b border-gray-300 bg-white p-2" :key="element.key" :disabled="element.disable" :class="{'pointer-events-none	opacity-50': element.disable}">
              {{ element.name }}
            </div>
          </template>
        </draggable>
      </div>

      <div class="w-auto">
        <h3 class="p-2 border-2 border-gray-300 border-b-1 font-bold bg-gray-100">Your columns</h3>
        <draggable name="table_columns" class="border border-gray-300 list-group border-b-0" :list="lists.list2" group="people" @change="updateList" item-key="key">
          <template #item="{ element }">
            <div class="list-group-item border-b border-gray-300 bg-white p-2" :key="element.key" :disabled="element.disable" :class="{'pointer-events-none	opacity-50': element.disable}">
              {{ element.name }}
            </div>
          </template>
        </draggable>
      </div>
    </div>

    <a-form-item>
      <a-space>
        <a-button :loading="loading" type="primary" html-type="submit">Submit</a-button>
      </a-space>
    </a-form-item>
  </a-form>

</template>
