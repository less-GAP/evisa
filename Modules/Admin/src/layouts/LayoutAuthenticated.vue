<script setup>
import {mdiForwardburger, mdiBackburger, mdiMenu} from "@mdi/js";
import {ref} from "vue";
import {useRouter, RouterLink} from "vue-router";
import menuAside from "@/menuAside.js";
import menuNavBar from "@/menuNavBar.js";
import {useMainStore} from "@/stores/main.js";
import {useStyleStore} from "@/stores/style.js";
import Header from "./Header.vue";
import Sidebar from "./Sidebar.vue";
import Footer from "./Footer.vue";
import {onMounted} from 'vue'

import {
  initAccordions,
  initCarousels,
  initCollapses,
  initDials,
  initDismisses,
  initDrawers,
  initDropdowns,
  initModals,
  initPopovers,
  initTabs,
  initTooltips
} from 'flowbite'
import {useAuthStore} from "@/stores/auth";
import {useAppStateStore} from "@/stores/appState";

// initialize components based on data attribute selectors
onMounted(() => {
  if (!useAuthStore().isLogin()) {
    router.replace('login')
  }
  initAccordions();
  initCarousels();
  initCollapses();
  initDials();
  initDismisses();
  initDrawers();
  initDropdowns();
  initModals();
  initPopovers();
  initTabs();
  initTooltips();

})


const styleStore = useStyleStore();

const router = useRouter();

const isAsideMobileExpanded = ref(false);
const isAsideLgActive = ref(false);

router.beforeEach(() => {
  isAsideMobileExpanded.value = false;
  isAsideLgActive.value = false;
});

const menuClick = (event, item) => {
  if (item.isToggleLightDark) {
    styleStore.setDarkMode();
  }

  if (item.isLogout) {
    //
  }
};
</script>

<template>
  <Header class="bg-dark" :style="{height:$style.theme.headerHeight}"></Header>
  <div :style="{'height':'calc(100vh - '+$style.theme.headerHeight+')'}"
       class="overflow-hidden flex relative w-full bg-gray-50 dark:bg-gray-900">
    <Sidebar class="h-full d-inline"></Sidebar>

    <main
      class="relative p-5 flex-1 w-full overflow-y-auto bg-gray-50  dark:bg-gray-900">
      <slot name="header-content"></slot>
      <a-card>
        <slot/>
      </a-card>

    </main>
    <Footer></Footer>

  </div>

</template>
<style lang="scss">
#sidebar.collapsed {

}
</style>
