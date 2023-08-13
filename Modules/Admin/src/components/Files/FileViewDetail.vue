<script setup>
import {FileOutlined} from "@ant-design/icons-vue";
import {InputUpload,InputCopy} from "@/components";
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

watch(() => props.value, async () => {
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

function isImageUrl(url) {
  return /\.(jpg|jpeg|png|webp|avif|gif|svg)$/.test(url);
}
</script>
<template>
  <a-image v-if=" isImageUrl(value.site_path)" width="100%" height="auto" :src="$url(value.site_path)" :alt="alt"/>
  <a-card shadow="none" style="padding:50px;width:200px;height:200px" v-else>
    <file-outlined style="font-size: 30px"/>
  </a-card>
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
    <a-descriptions-item label="File Url">
      <InputCopy :value="value.file_url"></InputCopy>
    </a-descriptions-item>
    <a-descriptions-item label="">
      <a-button type="link" target="_blank" :download="value.file_name" :href="value.file_url">Download</a-button>
    </a-descriptions-item>

  </a-descriptions>

</template>
