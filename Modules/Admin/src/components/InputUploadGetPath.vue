<template>
  <slot></slot>
  <div class="inline-flex relative rounded-lg overflow-hidden border border-gray-400">
    <a-image
    class="bg-white object-contain min-w-[200px] min-h-[200px] max-w-[200px] max-h-[200px]"
    :placeholder=true
    cover
    :src="$url(value)"
    fallback="data:image/png;base64,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"
      :width="width" :height="height" :alt="alt"/>
    <a-space>

      <a-upload
        v-bind="$attrs"
        :customRequest="upload"
        :openFileDialogOnClick="true"
        :withCredentials="true"
        :list-type="listType"
        :action="action"
        :accept="accept"
        :showUploadList="false"
        class="absolute bottom-2 right-2 rounded-0 !w-auto"
      >
        <a-card v-if="!value && placeholder" shadow="none"
                style="display:inline-block;margin-right:5px;text-align: center;position:relative">
          <template #cover>
            <img :width="width" :height="height" style="object-fit:contain"
                 :src="$url(placeholder)"
                 :alt="alt"/>
          </template>
        </a-card>
        <a-button class="bg-white rounded-0" :loading="loading">
          <upload-outlined></upload-outlined>
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
  </div>
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
