<template>
  <slot></slot>
  <a-image :width="width" :height="height" v-if="value" :src="$url(value)" :alt="alt"/>
  <br>
  <a-space class="mt-2">

    <a-upload
      v-bind="$attrs"
      :customRequest="upload"
      :openFileDialogOnClick="true"
      :withCredentials="true"
      :list-type="listType"
      :action="action"
      :accept="accept"
      :showUploadList="false"
    >
      <a-card v-if="!value && placeholder" shadow="none"
              style="display:inline-block;margin-right:5px;text-align: center;position:relative">
        <template #cover>
          <img :width="width" :height="height" style="object-fit:contain"
               :src="$url(placeholder)"
               :alt="alt"/>
        </template>
      </a-card>
      <br>
      <a-button size="mini" :loading="loading">
        <upload-outlined></upload-outlined>
        Upload
      </a-button>

    </a-upload>
    <a-button v-if="showSelect" type="primary" size="mini" @click="open=true"  :loading="loading">
      <SelectOutlined></SelectOutlined>
      Or Select
    </a-button>
  </a-space>
  <a-modal append-to-body v-model:open="open" top="2%" height="96vh" width="90vw" title="Select file">
    <FilePicker  @close="open=false" @select="onSelect"></FilePicker>
    <template #footer>
    </template>
  </a-modal>
</template>
<script lang="ts">
import {defineComponent, ref, watch, unref, computed} from 'vue';
import {Tooltip, Space} from 'ant-design-vue';
import {UploadOutlined,SelectOutlined} from "@ant-design/icons-vue";
import Api from "@/utils/Api";
import {FilePicker} from "./index";

export default defineComponent({
  name: 'InputUpload',
  components: {UploadOutlined,FilePicker,SelectOutlined},
  props: {
    value: Object,
    accept: String,
    alt: String,
    action: {
      type: String,
      default: '/file/Upload'
    },
    height: {
      type: Number,
      default: 'auto'
    },
    placeholder: String,

    showSelect: {
      type: Boolean,
      default: false
    },
    width: {
      type: Number,
      default: 200
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

    return {
      async upload(options) {
        loading.value = true
        let formData = new FormData();
        formData.append("file", options.file);
        formData.append("dir", props.dir);
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
      async onSelect(files) {
        emit('change', files[0].site_path);
        emit('update:value',  files[0].site_path);
        open.value = false
      },
      fileList: ref([]),
      open,
      handleChange,
      loading,
      file,
      buttonConfig: {
        type: Object,
        default: {
          type: 'primary'
          , size: 'mini'
        }
      },
      showPreview,
      bindValue,
    };
  },
});
</script>
