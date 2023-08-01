<template>
  <a-upload
    v-bind="$attrs"
    :customRequest="upload"
    :openFileDialogOnClick="true"
    :withCredentials="true"
    v-model:file-list="fileList"
    list-type="picture"
    :action="action"
    :accept="accept"
  >
    <a-button type="primary">
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
    action: {
      type: String,
      default: '/file/Upload'
    },
  },
  emits: ['change', 'delete', 'preview-delete', 'update:value'],

  setup(props, {emit, attrs}) {
    // 上传modal
    const fileList = ref<string[]>([]);

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
        const res = await Api.post(props.action, {
          headers: {
            'Content-Type': 'multipart/form-data'
          },
          url: options.action,
          file: options.file
        })

        emit('update:value', res);
        emit('change', res);
        return res
      },
      fileList: ref([]),
      handleChange,
      handlePreviewChange,
      showPreview,
      bindValue,
    };
  },
});
</script>
