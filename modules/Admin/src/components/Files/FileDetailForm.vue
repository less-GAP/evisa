<script setup>

import {InputUpload} from "@/components";
import {watch, ref} from "vue";
import Api from "@/utils/Api";
const emit = defineEmits(["delete"]);
const loading = ref(false);
const props = defineProps({
  value: {
    type: Object,
    default: {}
  }
})
const formState = ref({});

watch(()=>props.value, async () => {
  formState.value = props.value
})
const submit = async function () {
  loading.value = true
  await Api.post('file/Info', formState.value, {})
  loading.value = false
}
const handleDelete = async function () {
  await Api.delete('file/' + props.value.id)
  emit('delete')
}
</script>
<template>

  <a-row :gutter="20">
    <a-col :span="12">
      <InputUpload :dir="value.file_dir" :id="value?.id" :buttonConfig="{type:'primary'}" label="Replace" class="w-full"
                   v-model:value="value.site_path"></InputUpload>
    </a-col>
    <a-col :span="12">
      <a-descriptions size="small" :column="1">
        <a-descriptions-item label="Uploaded on"><b>{{ $format.formatDateTime(value.created_at) }}</b>
        </a-descriptions-item>
        <a-descriptions-item label="Uploaded by">
          <b>{{ value.created_by }}</b>
        </a-descriptions-item>
        <a-descriptions-item label="File name"><b>{{ value.file_name }}</b></a-descriptions-item>
        <a-descriptions-item label="File type"><b>{{ value.file_ext }}</b></a-descriptions-item>
        <a-descriptions-item label="File size">
          <b>{{ $format.humanFileSize(value.file_size) }}</b>
        </a-descriptions-item>

      </a-descriptions>

    </a-col>
  </a-row>
  <a-divider/>
  <a-form @finish="submit" v-bind="$config.formConfig" layout="horizontal" :model="formState" :label-col="24">
    <a-form-item  :labelCol="{ span:6 }" label="Title">
      <a-input v-model:value="formState.title"></a-input>
    </a-form-item>
    <a-form-item   :labelCol="{ span:6 }" label="Alternative Text">
      <a-textarea v-model:value="formState.alternative_text"></a-textarea>
      <p class="p-2 pl-0 pb-0" id="alt-text-description">
        <a class="text-main" href="https://www.w3.org/WAI/tutorials/images/decision-tree"
           target="_blank" rel="noopener">
          Learn how to describe the
          purpose of the image<span class="screen-reader-text"> (opens in a new tab)</span></a>. Leave empty if the
        image
        is purely decorative.</p>
    </a-form-item>
    <a-form-item :labelCol="{ span:6 }" label="Caption">
      <a-input v-model:value="formState.caption"></a-input>
    </a-form-item>
    <a-form-item :labelCol="{ span:6 }" label="Description">
      <a-textarea v-model:value="formState.description"></a-textarea>
    </a-form-item>
    <a-form-item :wrapperCol="{ offset:6 }">
      <a-button :loading="loading" type="primary" html-type="submit">Submit</a-button>
      <a-popconfirm @confirm="handleDelete" title="Are you sure？">
        <template #icon>
          <question-circle-outlined style="color: red"/>
        </template>
        <a-button class="mr-10" style="float:right"  type="primary" danger href="#">Delete</a-button>
      </a-popconfirm>
    </a-form-item>
  </a-form>
</template>
