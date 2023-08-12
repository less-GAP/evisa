<script setup>
import { computed } from "vue";

const props = defineProps({
  path: {
    type: String,
    required: true,
  },
  w: {
    type: String,
    default: "w-6",
  },
  h: {
    type: String,
    default: "h-6",
  },
  size: {
    type: [String, Number],
    default: null,
  },
});

const spanClass = computed(
  () => `class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" ${props.w} ${props.h}`
);

const iconSize = computed(() => props.size ?? 16);
</script>

<template>
    <svg
      :class="spanClass"
      viewBox="0 0 24 24"
      :width="iconSize"
      :height="iconSize"
    >
      <path fill="currentColor" :d="path" />
    </svg>
</template>
