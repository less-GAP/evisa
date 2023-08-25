<script lang="ts">
import {defineComponent, nextTick, reactive, ref, watch} from 'vue';
import {Tooltip, Space} from 'ant-design-vue';
import {PlusOutlined, CloseCircleOutlined} from "@ant-design/icons-vue";
import Api from "@/utils/Api";

export default defineComponent({
  components: {PlusOutlined, CloseCircleOutlined},
  props: {
    value: Array
  },
  emits: ['change', 'update:value'],
  setup(props, {emit, attrs}) {
    const state = reactive({
      tags: [...props.value],
      inputVisible: false,
      fetching: false,
      inputValue: '',
    });
    watch(()=>props.value,function(){
      state.tags = props.value
    })
    const options = ref([]);
    const inputRef = ref();
    const addItem = () => {
    };
    const fetch = function () {
      Api.get('tag/all?limit=10000').then(rs => {
        options.value = rs.data
      })
    }
    fetch();
    return {
      fetch,
      addItem,
      options,
      inputRef,
      state,
      handleChange(value) {
        emit('change', state.tags)
        emit('update:value', state.tags)
      },
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
  <a-select
    @change="handleChange"
    v-model:value="state.tags"
    mode="tags"
    :field-names="{ label: 'name', value: 'name' }"
    :token-separators="[',']"
    placeholder="Select tags"
    style="width: 100%;height:100px"
    :not-found-content="state.fetching ? undefined : null"
    :options="options"
  >

  </a-select>

</template>
