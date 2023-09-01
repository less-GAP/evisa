<template>
  <a-spin v-if="loading"/>
  <slot v-else v-bind="{data}"></slot>
</template>
<script lang="ts">
import {defineComponent, ref, watch, unref, computed} from 'vue';
import Api from "@/utils/Api";

export default defineComponent({
  components: {},
  props: {
    value: [String, Number, Array],
    url: String,
    method: {type: String, default: 'GET'},
    valueKey: Array,
    params: Object,
  },
  emits: ['change', 'update:value'],

  setup(props, {emit}) {
    const loading = ref(true);
    const data = ref(null);

    function getData(result) {
      return result.data
    }

    async function fetch() {
      loading.value = true
      const result = await Api.request({method:props.method,url:props.url,params: props.params});
      data.value = getData(result)
      emit('update:value', data.value)
      emit('change', data.value)
      loading.value = false
    }

    watch(() => props.params, function () {
      fetch()
    })

    fetch()
    return {
      loading,
      data
    };
  },
});
</script>
