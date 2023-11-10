<template>
  <Editor
v-model="modelValue" :api-key="$appState.editorKey" model-events="change keydown blur focus paste" :init="{
    menubar: true,
    branding: false,
    plugins: 'autolink fullscreen charmap  emoticons  link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste tinymcespellchecker autocorrect  typography inlinecss',
    // toolbar: 'add_image | fullscreen | undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link  media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
    // 2 line toolbar
    toolbar: [
      'add_image | undo redo | blocks fontfamily fontsize fullscreen', 
      'bold italic underline strikethrough link  media table mergetags, align lineheight tinycomments checklist numlist bullist indent outdent emoticons charmap removeformat',
    ],
    tinycomments_mode: 'inline',
    tinycomments_author: 'Author name',
    apply_source_formatting : true,
    toolbar_mode: 'scrolling',
    image_dimensions: false,
    min_height: 750,
    resize: true,
    autoScroll: true,
    autoresize_bottom_margin: 25,
    content_style: 'img {max-width: 100%;}',
    relative_urls : false,
    remove_script_host : false,
    mergetags_list: [
      { value: 'First.Name', title: 'First Name' },
      { value: 'Email', title: 'Email' },
    ],
    ai_request: (request, respondWith) => respondWith.string(() => Promise.reject('See docs to implement AI Assistant')),
    setup: setupEditor
  }" />
  <a-modal
v-model:open="showPicker" style="z-index:99999;top: 2vh;height:98vh" height="96vh" width="90vw"
    title="Select file">
    <FilePicker :multiple="true" @close="showPicker = false" @select="onSelectImage"></FilePicker>
    <template #footer>
    </template>
  </a-modal>
</template>
<script lang="ts">
import Editor from '@tinymce/tinymce-vue';
import { defineComponent, ref, watch } from 'vue';
import { FilePicker } from "./index";

export default defineComponent({
  components: { Editor, FilePicker },
  props: {
    value: Object,
  },
  emits: ['change', 'delete', 'preview-delete', 'update:value'],

  setup(props, { emit, attrs }) {
    const modelValue = ref(props.value)
    const showPicker = ref(false)
    watch(() => props.value, () => {
      modelValue.value = props.value
    })
    watch(() => modelValue.value, () => {
      emit('change', modelValue.value)
      emit('update:value', modelValue.value)
    })
    let selectImageHandle = null
    const onSelectImage = function (images) {
      if (selectImageHandle) {
        selectImageHandle(images)
      }
    }
    return {
      showPicker,
      setupEditor(editor) {
        editor.ui.registry.addButton('add_image', {
          text: 'Add Image',
          icon: 'image',
          onAction: function (_) {
            showPicker.value = true
            selectImageHandle = function (images) {
              images.forEach(function (image) {
                showPicker.value = false
                const html = `<img width=100% title=` + image.title + ` src=` + image.file_url + ` />`;
                editor.insertContent(html);
              })
            }

          }
        });
      },
      onSelectImage,
      modelValue
    };
  },
});
</script>
