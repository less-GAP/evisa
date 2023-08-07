<script setup>
import {mdiForwardburger, mdiBackburger, mdiMenu} from "@mdi/js";
import {ref} from "vue";
import {useRouter,RouterLink} from "vue-router";
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
import {useAppStateStore} from "@/stores/appState";

// initialize components based on data attribute selectors
onMounted(() => {
  if (!useAuthStore().isLogin()) {
    router.push('login')
  }


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
  <div
    :class="{
      dark: styleStore.darkMode,
      'overflow-hidden lg:overflow-visible': isAsideMobileExpanded,
    }"
  >
    <div
      :class="[!$appState.menuCollapsed?'xl:pl-[365px] l:pl-0':'xl:pl-[160px] l:pl-0', { 'ml-60 lg:ml-0': isAsideMobileExpanded }]"
      class=" min-h-screen w-screen transition-position lg:w-auto bg-gray-50 dark:bg-slate-800 dark:text-slate-100"
    >
      <header class="relative z-10 p-4 bg-white shadow-sm 2xl:p-8">
        <div class="flex items-center">
          <div class="flex items-center mr-10 2xl:hidden">
            <button id="open-menu"
                    @click="$appState.showMenu = true"
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
              <a href="#/" class="">
                <img class="w-[100px] lg:w-[120px] 2xl:w-[165px]" src="@/assets/logo.png" alt="Power of Five">
              </a>
            </div>
          </div>
          <h1 class="hidden title-page md:block">{{ $appState.title }}</h1>
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
            <a-dropdown>
              <template #overlay>
                <div
                  class="text-sm border-b border-gray-100 lg:border lg:bg-white lg:absolute lg:top-full lg:left-0 lg:min-w-full lg:z-20 lg:rounded-lg lg:shadow-lg lg:dark:bg-slate-800 dark:border-slate-700">
                  <router-link
                    to="/user/profile"
                    class="block lg:flex items-center relative cursor-pointer text-black dark:text-white dark:hover:text-slate-400 hover:text-blue-500 py-2 px-3">
                    <div class="flex items-center"><!----><span
                      class="inline-flex justify-center items-center w-6 h-6 transition-colors"><svg viewBox="0 0 24 24"
                                                                                                     width="16"
                                                                                                     height="16"
                                                                                                     class="inline-block"><path
                      fill="currentColor"
                      d="M12,4A4,4 0 0,1 16,8A4,4 0 0,1 12,12A4,4 0 0,1 8,8A4,4 0 0,1 12,4M12,14C16.42,14 20,15.79 20,18V20H4V18C4,15.79 7.58,14 12,14Z"></path></svg></span><span
                      class="px-2 transition-colors">My Profile</span><!----></div><!----></router-link>
<!--                  <div-->
<!--                    class="block lg:flex items-center relative cursor-pointer text-black dark:text-white dark:hover:text-slate-400 hover:text-blue-500 py-2 px-3">-->
<!--                    <div class="flex items-center">&lt;!&ndash;&ndash;&gt;<span-->
<!--                      class="inline-flex justify-center items-center w-6 h-6 transition-colors"><svg viewBox="0 0 24 24"-->
<!--                                                                                                     width="16"-->
<!--                                                                                                     height="16"-->
<!--                                                                                                     class="inline-block"><path-->
<!--                      fill="currentColor"-->
<!--                      d="M12,8A4,4 0 0,1 16,12A4,4 0 0,1 12,16A4,4 0 0,1 8,12A4,4 0 0,1 12,8M12,10A2,2 0 0,0 10,12A2,2 0 0,0 12,14A2,2 0 0,0 14,12A2,2 0 0,0 12,10M10,22C9.75,22 9.54,21.82 9.5,21.58L9.13,18.93C8.5,18.68 7.96,18.34 7.44,17.94L4.95,18.95C4.73,19.03 4.46,18.95 4.34,18.73L2.34,15.27C2.21,15.05 2.27,14.78 2.46,14.63L4.57,12.97L4.5,12L4.57,11L2.46,9.37C2.27,9.22 2.21,8.95 2.34,8.73L4.34,5.27C4.46,5.05 4.73,4.96 4.95,5.05L7.44,6.05C7.96,5.66 8.5,5.32 9.13,5.07L9.5,2.42C9.54,2.18 9.75,2 10,2H14C14.25,2 14.46,2.18 14.5,2.42L14.87,5.07C15.5,5.32 16.04,5.66 16.56,6.05L19.05,5.05C19.27,4.96 19.54,5.05 19.66,5.27L21.66,8.73C21.79,8.95 21.73,9.22 21.54,9.37L19.43,11L19.5,12L19.43,13L21.54,14.63C21.73,14.78 21.79,15.05 21.66,15.27L19.66,18.73C19.54,18.95 19.27,19.04 19.05,18.95L16.56,17.95C16.04,18.34 15.5,18.68 14.87,18.93L14.5,21.58C14.46,21.82 14.25,22 14,22H10M11.25,4L10.88,6.61C9.68,6.86 8.62,7.5 7.85,8.39L5.44,7.35L4.69,8.65L6.8,10.2C6.4,11.37 6.4,12.64 6.8,13.8L4.68,15.36L5.43,16.66L7.86,15.62C8.63,16.5 9.68,17.14 10.87,17.38L11.24,20H12.76L13.13,17.39C14.32,17.14 15.37,16.5 16.14,15.62L18.57,16.66L19.32,15.36L17.2,13.81C17.6,12.64 17.6,11.37 17.2,10.2L19.31,8.65L18.56,7.35L16.15,8.39C15.38,7.5 14.32,6.86 13.12,6.62L12.75,4H11.25Z"></path></svg></span><span-->
<!--                      class="px-2 transition-colors">Settings</span>&lt;!&ndash;&ndash;&gt;</div>&lt;!&ndash;&ndash;&gt;</div>-->
<!--                  <div-->
<!--                    class="block lg:flex items-center relative cursor-pointer text-black dark:text-white dark:hover:text-slate-400 hover:text-blue-500 py-2 px-3">-->
<!--                    <div class="flex items-center">&lt;!&ndash;&ndash;&gt;<span-->
<!--                      class="inline-flex justify-center items-center w-6 h-6 transition-colors"><svg viewBox="0 0 24 24"-->
<!--                                                                                                     width="16"-->
<!--                                                                                                     height="16"-->
<!--                                                                                                     class="inline-block"><path-->
<!--                      fill="currentColor"-->
<!--                      d="M20,8L12,13L4,8V6L12,11L20,6M20,4H4C2.89,4 2,4.89 2,6V18A2,2 0 0,0 4,20H20A2,2 0 0,0 22,18V6C22,4.89 21.1,4 20,4Z"></path></svg></span><span-->
<!--                      class="px-2 transition-colors">Messages</span>&lt;!&ndash;&ndash;&gt;</div>&lt;!&ndash;&ndash;&gt;</div>-->
                  <hr class="hidden lg:block lg:my-0.5 dark:border-slate-700 border-t border-gray-100">
                  <div
                    @click="$auth.logout"
                    class="block lg:flex items-center relative cursor-pointer text-black dark:text-white dark:hover:text-slate-400 hover:text-blue-500 py-2 px-3">
                    <div class="flex items-center"><!----><span
                      class="inline-flex justify-center items-center w-6 h-6 transition-colors"><svg viewBox="0 0 24 24"
                                                                                                     width="16"
                                                                                                     height="16"
                                                                                                     class="inline-block"><path
                      fill="currentColor"
                      d="M16,17V14H9V10H16V7L21,12L16,17M14,2A2,2 0 0,1 16,4V6H14V4H5V20H14V18H16V20A2,2 0 0,1 14,22H5A2,2 0 0,1 3,20V4A2,2 0 0,1 5,2H14Z"></path></svg></span><span
                      class="px-2 transition-colors">Log Out</span><!----></div><!----></div>
                </div>
              </template>
              <button class="flex items-center ml-4 text-left 2xl:ml-10" id="user-control">
                <div class="avatar">
                  <!-- <img src="https://secure.gravatar.com/avatar/bb90dcb0ceabfc8bf10c550f1ee95ee7?s=96&d=mm&r=g" alt=""> -->
                  <img class="object-cover w-10 h-10 rounded-lg 2xl:w-[60px] 2xl:h-[60px] 2xl:rounded-2xl"
                       :src="$auth.user.profile_photo_url" alt="user-1">
                </div>
                <div class="hidden ml-5 md:block">
                  <div class="user-hi text-[#737791] font-medium text-sm">Hi,</div>

                  <div class="user-name font-bold text-[#151D48]">{{ $auth.user.full_name }}</div>
                </div>
                <div class="ml-2 btn-toggle md:ml-4 2xl:ml-8">
                  <svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4 5.82861L8 9.12381L12 5.82861" stroke="#151D48" stroke-width="2" stroke-linecap="round"
                          stroke-linejoin="round"></path>
                  </svg>
                </div>
              </button>
            </a-dropdown>

          </nav>
        </div>
      </header>
      <AsideMenu
        class="bg-white"
        :is-aside-mobile-expanded="isAsideMobileExpanded"
        :is-aside-lg-active="isAsideLgActive"
        :menu="menuAside"
        @menu-click="menuClick"
        @aside-lg-close-click="isAsideLgActive = false"
      />
      <div id="main-site" class="p-[10px] 2xl:p-8">
        <div id="unify-content">
          <div class="uni-main-container mb-5 ">
            <slot/>
          </div>
        </div>
      </div>
      <FooterBar>

      </FooterBar>
    </div>
  </div>
</template>
