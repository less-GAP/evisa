<script setup>
import { mdiLogout, mdiClose } from "@mdi/js";
import { computed } from "vue";
import { useStyleStore } from "@/stores/style.js";
import AsideMenuList from "@/components/AsideMenuList.vue";
import AsideMenuItem from "@/components/AsideMenuItem.vue";
import BaseIcon from "@/components/BaseIcon.vue";

defineProps({
  menu: {
    type: Array,
    required: true,
  },
});

const emit = defineEmits(["menu-click", "aside-lg-close-click"]);

const styleStore = useStyleStore();



const menuClick = (event, item) => {
  emit("menu-click", event, item);
};

const asideLgCloseClick = (event) => {
  emit("aside-lg-close-click", event);
};
</script>

<template>
  <aside
    id="aside"
    :class="[
            !$appState.menuCollapsed ? 'w-[365px]' : 'w-[365px] xl:w-[160px]',
            $appState.showMenu ? 'left-0' : '-left-[365px] xl:left-0',
    ]"
    class=" xl:left-0 fixed flex z-40 top-0 h-screen transition-position overflow-hidden"
  >
    <div
      :class="styleStore.asideStyle"
      class="lg:rounded-2xl flex-1 flex flex-col overflow-hidden dark:bg-slate-900"
    >
      <div class="relative p-4 top-nav 2xl:p-8">
        <div class="flex items-center justify-center">
          <div class="logo">
            <a href="/" class="">
              <img v-show="!$appState.menuCollapsed" id="logo-normal" class="w-[80px] lg:w-[120px] 2xl:w-[165px]" src="@/assets/logo.png" alt="Power of Five">
              <img v-show="$appState.menuCollapsed" id="logo-minimized" class="w-[60px] " src="@/assets/logo-minimized.png" alt="Power of Five">
            </a>
          </div>
          <button  v-show="!$appState.menuCollapsed && !$appState.showMenu"  @click="$appState.menuCollapsed = true" id="minimize-menu" class="ml-auto cursor-pointer hamburger-icon w-[32px] md:w-[40px] 2xl:w-auto">
            <svg width="56" height="56" viewBox="0 0 56 56" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M25.6665 39.6665L44.3332 39.6665" stroke="#14082D" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path>
              <path d="M11.6665 28H44.3332" stroke="#14082D" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path>
              <path d="M25.6665 16.3335L44.3332 16.3335" stroke="#14082D" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
          </button>
          <button  @click="$appState.menuCollapsed = false;$appState.showMenu=false" v-show="$appState.menuCollapsed || $appState.showMenu" id="close-menu" class="rotate-180 2xl:rotate-0 2xl:absolute 2xl:top-1/2 2xl:-translate-y-1/2 2xl:-right-2 ml-auto cursor-pointer hamburger-icon w-[32px] md:w-[40px] 2xl:w-auto ">
            <svg width="56" height="56" viewBox="0 0 56 56" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M44.3335 14V42M37.3335 28H9.3335M37.3335 28L29.1668 19.8333M37.3335 28L29.1668 36.1667" stroke="#262F56" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
          </button>
        </div>
      </div>
      <div
        :class="
          styleStore.darkMode
            ? 'aside-scrollbars-[slate]'
            : styleStore.asideScrollbarsStyle
        "
        class="p-4 main-nav 2xl:py-6 2xl:px-8"
      >
        <AsideMenuList :menu="menu" @menu-click="menuClick" />
      </div>

    </div>
  </aside>
</template>
