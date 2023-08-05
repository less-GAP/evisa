<template>
  <slot></slot>
  <a-image v-if="value && isImageUrl(value)" :width="width" :height="height" :src="$url(value)" :alt="alt"/>
  <a-card shadow="none" style="padding:50px;width:200px;height:200px" v-if="value && !isImageUrl(value)" :width="width"
          :height="height">
    <file-outlined style="font-size: 30px"/>
  </a-card>
  <br>

  <a-button @click="open=true" v-bind="buttonConfig" :loading="loading">
    <upload-outlined></upload-outlined>
    {{ label }}
  </a-button>
  <a-modal v-model:open="open" top="5vh" height="90vh" width="90vw" title="Select file">
    <FilePicker @close="open=false" @select="onSelect"></FilePicker>
    <template #footer>
    </template>
  </a-modal>
</template>
<script lang="ts">
import {defineComponent, ref, watch, unref, computed} from 'vue';
import {Tooltip, Space} from 'ant-design-vue';
import {UploadOutlined, FileOutlined} from "@ant-design/icons-vue";
import Api from "@/utils/Api";
import {FilePicker} from "./index";

export default defineComponent({
  name: 'InputUpload',
  components: {UploadOutlined, FilePicker, FileOutlined},
  props: {
    value: Object,
    accept: String,
    alt: String,
    action: {
      type: String,
      default: '/file/Upload'
    },
    id: {
      type: String, Number
    },
    buttonConfig: {
      type: Object,
      default: {
        type: 'primary'
        , size: 'mini'
      }
    },
    label: {
      type: String,
      default: 'Upload'
    },
    height: {
      type: Number,
      default: 'auto'
    },
    width: {
      type: Number,
      default: '200px'
    },
    listType: {
      type: String,
      default: 'picture'
    },
    dir: {
      type: String,
      default: ''
    },
  },
  emits: ['change', 'delete', 'preview-delete', 'update:value'],

  setup(props, {emit, attrs}) {
    const fileList = ref<string[]>([]);
    const file = ref(null);
    const loading = ref(false);
    const open = ref(false);
    const showPreview = computed(() => {
      const {emptyHidePreview} = props;
      if (!emptyHidePreview) return true;
      return emptyHidePreview ? fileList.value.length > 0 : true;
    });

    const bindValue = computed(() => {
      const value = {...attrs, ...props};
      return emit(value, 'onChange');
    });


    // 上传modal保存操作
    function handleChange(urls: string[]) {
      fileList.value = [...unref(fileList), ...(urls || [])];
      emit('update:value', fileList.value);
      emit('change', fileList.value);
    }

    // 预览modal保存操作
    function handlePreviewChange(urls: string[]) {
      fileList.value = [...(urls || [])];
      emit('update:value', fileList.value);
      emit('change', fileList.value);
    }

    function isImageUrl(url) {
      return /\.(jpg|jpeg|png|webp|avif|gif|svg)$/.test(url);
    }

    return {
      async upload(options) {
        loading.value = true
        let formData = new FormData();
        formData.append("file", options.file);
        formData.append("dir", props.dir);
        formData.append("id", props.id);
        const res = await Api.post(props.action, formData, {
          headers: {
            'Content-Type': 'multipart/form-data'
          },
          url: options.action,
        })
        file.value = res.data
        emit('update:value', res.data.site_path);
        emit('change', res.data.site_path);
        loading.value = false

        return res
      },
      async onSelect(file) {
        emit('update:value', file.site_path);
        emit('change', file.site_path);
        open.value = false
      },
      fileList: ref([]),
      handleChange,
      loading,
      open,
      file,
      showPreview,
      isImageUrl,
      bindValue,
    };
  },
});
</script>
