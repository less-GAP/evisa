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
      Api.get('taxonomy/all?filter[type]=tag').then(rs => {
        options.value = rs.data
      })
    }
    const form = reactive({})
    function handleChange(value) {
      emit('change', state.tags)
      emit('update:value', state.tags)
    }

    fetch();
    return {
      form,
      fetch,
      addItem,
      options,
      inputRef,
      state,
      handleChange,
      addCategory() {
        Api.post('taxonomy', {name: form.name, type: 'tag'}).then(rs => {
          fetch();
        })
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
    mode="multiple"
    @change="handleChange"
    v-model:value="state.tags"
    :field-names="{ label: 'name', value: 'id' }"
    :token-separators="[',']"
    placeholder="Select tags"
    style="width: 100%;"
    :filter-option="false"
    :not-found-content="state.fetching ? undefined : null"
    :options="options"
  >

  </a-select>
  <a-divider />

  <a-form class="!mt-5" :model="form" validate-trigger="['submit']" @finish="addCategory()" layout="inline">
    <a-form-item  name="name" :rules="[{required:true}]">
      <a-input v-model:value="form.name"></a-input>
    </a-form-item>
    <a-form-item>

      <a-button html-type="submit">Add</a-button>
    </a-form-item>
  </a-form>
</template>
