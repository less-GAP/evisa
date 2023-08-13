<template>
  <a-select
    v-bind="$attrs"
    v-model:value="inputValue"
    @change="handleChange"
  >
    <a-select-option v-for="option in options" :value="option[valueKey]">
      <slot name="option" v-bind="{option}">
        {{option[labelKey]}}
      </slot>
    </a-select-option>

  </a-select>
</template>
<script lang="ts">
import {defineComponent, ref, watch, unref, computed} from 'vue';
import Api from "@/utils/Api";

export default defineComponent({
  name: 'InputUpload',
  components: {},
  props: {
    value: [String , Number , Array],
    url: String,
    valueKey: {
      type: String
      , default: 'value'
    },
    labelKey: {
      type: String
      , default: 'label'
    },
    params: Object,
  },
  emits: ['change', 'update:value'],

  setup(props, {emit}) {
    const inputValue = ref(props.value);
    const options = ref([]);
    watch( ()=>props.value, function () {
      inputValue.value = props.value
    })

    async function fetch() {
      const result = await Api.get(props.url, {params: props.params});
      options.value = result.data
    }
    fetch()
    return {
      inputValue,
      options,
      async handleChange() {
        emit('change', inputValue.value);
        emit('update:value', inputValue.value);
      },
    };
  },
});
</script>
