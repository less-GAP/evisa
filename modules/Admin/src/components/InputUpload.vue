<template>
  <slot></slot>
  <a-image-preview-group>
    <a-space>
      <template v-for="file in getItems()">
        <a-image v-if="isImageUrl(file.site_path)" :width="width" :height="height" :src="$url(file.site_path)"
                 :alt="alt"/>
        <a-card shadow="none" style="padding:50px;width:200px;height:200px" v-else :width="width"
                :height="height">
          <file-outlined style="font-size: 30px"/>
        </a-card>
      </template>
    </a-space>
  </a-image-preview-group>
  <br>
  <a-space class="mt-2">
    <a-upload
      :multiple="multiple"
      v-bind="$attrs"
      :customRequest="upload"
      :openFileDialogOnClick="true"
      :withCredentials="true"
      :list-type="listType"
      :action="action"
      :accept="accept"
      :showUploadList="false"
    >
      <a-button size="mini" :loading="loading">
        <upload-outlined></upload-outlined>
        Upload
      </a-button>
    </a-upload>
    <a-button @click="open=true" v-bind="buttonConfig" :loading="loading">
      <SelectOutlined></SelectOutlined>
      Or Select
    </a-button>
  </a-space>
  <a-modal append-to-body v-model:open="open" top="2%" height="96vh" width="90vw" title="Select file">
    <FilePicker :multiple="multiple" @close="open=false" @select="onSelect"></FilePicker>
    <template #footer>
    </template>
  </a-modal>
</template>
<script lang="ts">
import {defineComponent, ref, watch, unref, computed} from 'vue';
import {Tooltip, Space} from 'ant-design-vue';
import {UploadOutlined, FileOutlined, SelectOutlined} from "@ant-design/icons-vue";
import Api from "@/utils/Api";
import {FilePicker} from "./index";

export default defineComponent({
  name: 'InputUpload',
  components: {UploadOutlined, SelectOutlined, FilePicker, FileOutlined},
  props: {
    value: Object,
    accept: String,
    alt: String,
    multiple: {
      type: Boolean,
      default: false
    },
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
    if (!Array.isArray(props.value) && props.multiple) {
      emit('update:value', []);
    }
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
        let tmp = null
        if (!props.multiple) {
          tmp = res.data
        } else {
          tmp = [...props.value]
          tmp.push(res.data)
        }
        emit('change', tmp);
        emit('update:value', tmp);
        loading.value = false
        return res
      },
      async onSelect(files) {
        let tmp = null
        if (!props.multiple) {
          tmp = files[0]
        } else {
          tmp = props.value.concat(files)
        }
        emit('change', tmp);
        emit('update:value', tmp);

        open.value = false
      },
      fileList: ref([]),
      handleChange,
      getItems() {
        if (props.multiple) {
          return props.value
        } else if (props.value) {
          return [props.value]
        }
        return []
      },
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
