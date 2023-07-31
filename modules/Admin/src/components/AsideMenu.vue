<script setup>
import AsideMenuLayer from "@/components/AsideMenuLayer.vue";
import OverlayLayer from "@/components/OverlayLayer.vue";
import {useAppStateStore} from "@/stores/appState";

defineProps({
  menu: {
    type: Array,
    required: true,
  },
  isAsideMobileExpanded: Boolean,
  isAsideLgActive: Boolean,
});

const emit = defineEmits(["menu-click", "aside-lg-close-click"]);

const menuClick = (event, item) => {
  useAppStateStore().showMenu=false
  emit("menu-click", event, item);
};

const asideLgCloseClick = (event) => {
  emit("aside-lg-close-click", event);
};
</script>

<template>
  <AsideMenuLayer
    class="h-full"
    :menu="menu"
    v-bind="$attrs"
    @menu-click="menuClick"
    @aside-lg-close-click="asideLgCloseClick"
  />
  <OverlayLayer
    v-show=" $appState.showMenu "
    class="xl:hidden"
    z-index="z-30"
    @overlay-click="$appState.showMenu = !$appState.showMenu"
  />
</template>
