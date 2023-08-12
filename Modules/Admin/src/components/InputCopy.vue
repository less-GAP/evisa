<script lang="ts">
import {defineComponent} from 'vue';
import {Tooltip, Space} from 'ant-design-vue';
import {CopyOutlined} from "@ant-design/icons-vue";
import {message} from 'ant-design-vue';

export default defineComponent({
  components: {CopyOutlined},
  props: {
    value: Object
  },
  emits: ['change', 'update:value'],
  setup(props, {emit, attrs}) {
    return {
      copy(){
        navigator.clipboard.writeText(props.value).then(function() {
          message.success('Copied to clipboard!')
        }, function(err) {
          message.error(err)

        });
      }
    };
  },
});
</script>

<template>
    <a-input  v-bind="$attrs" disabled v-model:value="value" >
      <template #suffix>
        <a-button @click="copy">
          <template #icon>
            <CopyOutlined/>
          </template>
        </a-button>
      </template>
    </a-input>
</template>
