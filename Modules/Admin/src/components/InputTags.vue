<script lang="ts">
import {defineComponent, nextTick, reactive, ref} from 'vue';
import {Tooltip, Space} from 'ant-design-vue';
import {PlusOutlined,CloseCircleOutlined} from "@ant-design/icons-vue";

export default defineComponent({
  components: {PlusOutlined,CloseCircleOutlined},
  props: {
    value: Array
  },
  emits: ['change', 'update:value'],
  setup(props, {emit, attrs}) {
    const state = reactive({
      tags: [...props.value],
      inputVisible: false,
      inputValue: '',
    });
    const inputRef = ref();
    return {
      inputRef,
      state,
      handleClose(removedTag) {
        const tags = state.tags.filter(tag => tag !== removedTag);
        state.tags = tags;
        emit('change', tags)
        emit('update:value', tags)
      },
      handleInputConfirm(focus = false) {
        const inputValue = state.inputValue;
        let tags = state.tags;
        if (inputValue && tags.indexOf(inputValue) === -1) {
          tags = [...tags, inputValue];
        }
        Object.assign(state, {
          tags,
          // inputVisible: false,
          inputValue: '',
        });

        emit('change', tags)
        emit('update:value', tags)
        if (focus) {
          setTimeout(function () {
            nextTick(() => {
              inputRef.value.focus();
            });
          }, 200)
        }
      },
      showInput() {
        state.inputVisible = true;
        nextTick(() => {
          inputRef.value.focus();
        });
      }
    };
  },
});
</script>

<template>
  <div>
    <a-input
      ref="inputRef"
      v-model:value="state.inputValue"
      type="text"
      size="small"
      class="mb-5"
      :style="{ minWidth: '78px' }"
      @keyup.enter="handleInputConfirm(true)"
      @keyup.tab="handleInputConfirm(true)"
    />
    <template v-for="(tag, index) in state.tags" :key="tag">
      <span class="border inline-block nowrap rounded p-2 mr-2 mb-2 pr-0 relative" >
        {{ tag }}
        <a-button type="link" style="height:auto;font-size:15px;padding:0" @click="handleClose(tag)">
          <template #icon>
            <close-circle-outlined  />
          </template>
        </a-button>
      </span>
    </template>

  </div>

</template>
