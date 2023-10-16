<template>
  <a-select
    show-search
    v-bind="$attrs"
    :filterOption="onFilter"
    @search="filterOption"
    v-model:value="inputValue"
    @change="handleChange"
  >
    <template :key="option[valueKey]" v-for="option in filteredOptions">
      <slot name="option" v-bind="{option,valueKey,labelKey}">
        <a-select-option :value="typeof inputValue == 'string'?String(option[valueKey]):option[valueKey]">
          {{ option[labelKey] }}
        </a-select-option>
      </slot>
    </template>

  </a-select>
</template>
<script lang="ts">
import {defineComponent, ref, watch, unref, computed, toRaw} from 'vue';
import Api from "@/utils/Api";

export default defineComponent({
  name: 'InputUpload',
  components: {},
  props: {
    value: [String, Number, Array],
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
    const filteredOptions = ref([]);
    watch(() => props.value, function () {
      inputValue.value = props.value
    })

    function onFilter() {
      return true
    }

    const filterOption = (input: string) => {
      if (!input || input == '') {
        filteredOptions.value = toRaw(options.value)
        return
      }
      const filters = toRaw(options.value).filter(option => {
        return String(option[props.labelKey]).toLowerCase().indexOf(String(input).toLowerCase()) >=0 || String(option[props.valueKey]).toLowerCase().indexOf(String(input).toLowerCase()) >= 0;
      })
      filteredOptions.value = filters
      return
    };


    async function fetch() {
      const result = await Api.get(props.url, {params: props.params});
      options.value = result.data
      filterOption('')
    }

    fetch()
    return {
      filteredOptions,
      inputValue,
      onFilter,
      filterOption,
      options,
      async handleChange() {
        emit('update:value', inputValue.value);
        emit('change', inputValue.value);
      },
    };
  },
});
</script>
