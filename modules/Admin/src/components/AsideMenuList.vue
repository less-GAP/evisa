<script setup>
import AsideMenuItem from "@/components/AsideMenuItem.vue";
import {computed} from "vue";
import {mdiLogout} from "@mdi/js";

defineProps({
  isDropdownList: Boolean,
  menu: {
    type: Array,
    required: true,
  },
});

const emit = defineEmits(["menu-click"]);
const logoutItem = computed(() => ({
  label: "Logout",
  icon: mdiLogout,
  isLogout: true,
}));
const menuClick = (event, item) => {
  emit("menu-click", event, item);
};
</script>

<template>
  <ul>
    <AsideMenuItem
      v-for="(item, index) in menu"
      :key="index"
      :item="item"
      :is-dropdown-list="isDropdownList"
      @menu-click="menuClick"
    />
    <AsideMenuItem :item="logoutItem" @menu-click="menuClick" />

  </ul>
</template>
