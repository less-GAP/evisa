<template>
    <slot></slot>
    <a-image :width="width" :height="height" v-if="value" :src="$url(value)" :alt="alt"/>
    <br>
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
      <a-button size="mini" :loading="loading" >
        <upload-outlined></upload-outlined>
        Upload
      </a-button>
    </a-upload>

</template>
<script lang="ts">
import {defineComponent, ref, watch, unref, computed} from 'vue';
import {Tooltip, Space} from 'ant-design-vue';
import {UploadOutlined} from "@ant-design/icons-vue";
import Api from "@/utils/Api";

export default defineComponent({
  name: 'InputUpload',
  components: {UploadOutlined},
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
      default: '/file/Upload'
    },
  },
  emits: ['change', 'delete', 'preview-delete', 'update:value'],

  setup(props, {emit, attrs}) {
    const fileList = ref<string[]>([]);
    const file = ref(null);
    const loading = ref(false);
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
      fileList: ref([]),
      handleChange,
      loading,
      file,
      showPreview,
      bindValue,
    };
  },
});
</script>
