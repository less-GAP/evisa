<script setup>
import {mdiForwardburger, mdiBackburger, mdiMenu} from "@mdi/js";
import {ref} from "vue";
import {useRouter} from "vue-router";
import menuAside from "@/menuAside.js";
import menuNavBar from "@/menuNavBar.js";
import {useMainStore} from "@/stores/main.js";
import {useStyleStore} from "@/stores/style.js";
import BaseIcon from "@/components/BaseIcon.vue";
import FormControl from "@/components/FormControl.vue";
import NavBar from "@/components/NavBar.vue";
import NavBarItemPlain from "@/components/NavBarItemPlain.vue";
import AsideMenu from "@/components/AsideMenu.vue";
import FooterBar from "@/components/FooterBar.vue";
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

// initialize components based on data attribute selectors
onMounted(() => {
  if (!useAuthStore().isLogin()) {
    router.push('login')
  }


})


const layoutAsidePadding = "xl:pl-[345px]";

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
  <div
    :class="{
      dark: styleStore.darkMode,
      'overflow-hidden lg:overflow-visible': isAsideMobileExpanded,
    }"
  >
    <div
      :class="[layoutAsidePadding, { 'ml-60 lg:ml-0': isAsideMobileExpanded }]"
      class=" min-h-screen w-screen transition-position lg:w-auto bg-gray-50 dark:bg-slate-800 dark:text-slate-100"
    >
      <header class="relative z-10 p-4 bg-white shadow-sm 2xl:p-8">
        <div class="flex items-center">
          <div class="flex items-center mr-10 2xl:hidden">
            <button id="open-menu"
                    @click="$appState.showMenu = !$appState.showMenu"
                    class="cursor-pointer hamburger-icon w-[32px] md:w-[40px] 2xl:w-auto mr-5 rotate-180">
              <svg width="56" height="56" viewBox="0 0 56 56" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M25.6665 39.6665L44.3332 39.6665" stroke="#14082D" stroke-width="3" stroke-linecap="round"
                      stroke-linejoin="round"></path>
                <path d="M11.6665 28H44.3332" stroke="#14082D" stroke-width="3" stroke-linecap="round"
                      stroke-linejoin="round"></path>
                <path d="M25.6665 16.3335L44.3332 16.3335" stroke="#14082D" stroke-width="3" stroke-linecap="round"
                      stroke-linejoin="round"></path>
              </svg>
            </button>
            <div class="logo">
              <a href="https://po5.usa-server.com/admincp/" class="">
                <img class="w-[100px] lg:w-[120px] 2xl:w-[165px]" src="@/assets/logo.png" alt="Power of Five">
              </a>
            </div>
          </div>
          <nav class="flex items-center ml-auto" id="user-nav">
            <div class="notification">
              <button class="relative w-8 bell-icon 2xl:w-auto">
                <span
                  class="notification-dot absolute w-3 h-3 bg-[#EB5757] border border-solid border-white rounded-full right-1 top-1"></span>
                <svg width="38" height="38" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M9.5 12.6665C9.5 7.41979 13.7533 3.1665 19 3.1665V3.1665C24.2467 3.1665 28.5 7.4198 28.5 12.6665V17.3332C28.5 18.415 28.8509 19.4677 29.5 20.3332L32.3777 24.1701C32.8638 24.8182 32.7271 25.7122 32.0028 26.0752C30.1355 27.0112 26.0565 28.4998 19 28.4998C11.9436 28.4998 7.86447 27.0112 5.99724 26.0752C5.27295 25.7122 5.1362 24.8182 5.62231 24.1701L8.5 20.3332C9.14911 19.4677 9.5 18.415 9.5 17.3332V12.6665Z"
                    fill="#262F56"></path>
                  <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M15.0908 30.7105C15.3913 32.5986 17.027 34.0417 18.9998 34.0417C20.9725 34.0417 22.6082 32.5986 22.9087 30.7104C21.7224 30.8146 20.4215 30.8751 18.9997 30.8751C17.578 30.8751 16.2771 30.8146 15.0908 30.7105Z"
                        fill="#262F56"></path>
                </svg>
              </button>
            </div>
            <button class="flex items-center ml-4 text-left 2xl:ml-10" id="user-control">
              <div class="avatar">
                <!-- <img src="https://secure.gravatar.com/avatar/bb90dcb0ceabfc8bf10c550f1ee95ee7?s=96&d=mm&r=g" alt=""> -->
                <img class="object-cover w-10 h-10 rounded-lg 2xl:w-[60px] 2xl:h-[60px] 2xl:rounded-2xl"
                     :src="$auth.user.profile_photo_url" alt="user-1">
              </div>
              <div class="hidden ml-5 md:block">
                <div class="user-hi text-[#737791] font-medium text-sm">Hi,</div>

                <div class="user-name font-bold text-[#151D48]">{{$auth.user.full_name}}</div>
              </div>
              <div class="ml-2 btn-toggle md:ml-4 2xl:ml-8">
                <svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M4 5.82861L8 9.12381L12 5.82861" stroke="#151D48" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round"></path>
                </svg>
              </div>
            </button>
          </nav>
        </div>
      </header>
      <AsideMenu
        :is-aside-mobile-expanded="isAsideMobileExpanded"
        :is-aside-lg-active="isAsideLgActive"
        :menu="menuAside"
        @menu-click="menuClick"
        @aside-lg-close-click="isAsideLgActive = false"
      />
      <div id="main-site" class="p-[10px] 2xl:p-8">
        <div id="unify-content">
          <div class="uni-main-container mb-5">
            <slot/>
          </div>
        </div>
      </div>
      <FooterBar>

      </FooterBar>
    </div>
  </div>
</template>
