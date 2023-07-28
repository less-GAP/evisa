<script setup>
import AsideMenuItem from "@/components/AsideMenuItem.vue";
import {computed} from "vue";
import {mdiLogout} from "@mdi/js";
import router from "@/router";
import {useAuthStore} from "@/stores/auth";

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
const logout = (event, item) => {
  useAuthStore().$reset()
  router.push('login')
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
    <AsideMenuItem :item="logoutItem" @menu-click="logout" />

  </ul>
</template>
