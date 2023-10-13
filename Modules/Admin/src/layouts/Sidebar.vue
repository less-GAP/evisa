<script setup>
import {BaseIcon} from "@/components";
import menuAside from "@/menuAside.js";
import router from "@/router";

</script>
<template>
  <aside
    :class="$appState.showMenu ? 'w-[' + $style.theme.sidebarWidth + '] lg:flex h-full w-60 bg-stone-100' : 'lg:w-[' + $style.theme.sidebarCollapsedWidth + '] collapsed lg:left-0 -left-[' + $style.theme.sidebarWidth + ']0 bg-stone-100'"
    id="sidebar" aria-label="Sidebar">
    <div class="relative flex flex-col flex-1 min-h-0 pt-0 border-r border-gray-200 h-full  ">
      <div class="flex flex-col flex-1 pt-5 pb-4 overflow-y-auto">
        <div class="flex-1 px-3 space-y-1  divide-y divide-gray-200 flex flex-col justify-between">
          <div class="menuf">
            <ul class="pb-2 space-y-2">
              <template v-for="(menu, key) in menuAside" :key="key">

                <li v-if="$auth.hasPermission(menu.permission)">
                  <div v-if="menu.to !== null"
                       :class="menu.disable ? 'opacity-50 pointer-events-none cursor-not-allowed' : ''">
                    <router-link :to="menu.to" :class="$route.matched.filter(matched=>matched.path.includes(menu.to)).length
                    ? 'flex items-center p-2 text-base text-gray-900 rounded-lg hover:bg-gray-300 group bg-gray-300' :
                    'flex items-center p-2 text-base text-gray-900 rounded-lg hover:bg-gray-300 group'"
                                 v-if="!menu.children">
                      <BaseIcon v-if="menu.icon" :path="menu.icon" class="flex-none"
                                :class="[vSlot && vSlot.isExactActive ? asideMenuItemActiveStyle : '']"
                                :w="'w-' + $style.menu.iconSize" :size="$style.menu.iconSize"/>
                      <span class="ml-3" sidebar-toggle-item="">{{ menu.label }}</span>
                    </router-link>
                    <button type="button" :class="menu.children.filter(child=>$route.fullPath.includes(child.to)).length
                    ? 'flex items-center w-full p-2 text-base text-gray-900 rounded-lg hover:bg-gray-300 group bg-gray-300' :
                    'w-full flex items-center p-2 text-base text-gray-900 rounded-lg hover:bg-gray-300 group '"
                            :aria-controls="key" :data-collapse-toggle="key" v-else>
                      <BaseIcon v-if="menu.icon" :path="menu.icon" class="flex-none"
                                :class="[vSlot && vSlot.isExactActive ? asideMenuItemActiveStyle : '']"
                                :w="'w-' + $style.menu.iconSize" :size="$style.menu.iconSize"/>
                      <span class="flex-1 ml-3 text-left whitespace-nowrap">{{ menu.label }}</span>
                      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                           viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="m1 1 4 4 4-4"/>
                      </svg>
                    </button>
                    <ul v-if="menu.children && menu.children.length" :id="key" class=" py-2 space-y-2"
                        :class="$appState.showMenu &&menu.children?.filter(child=>$route.fullPath.includes(child.to)).length ? 'block' : 'hidden'">
                      <li v-for="(child, index) in menu.children" :key="index">
                        <router-link :to="child.to"
                                     :class="$route.fullPath.includes(child.to) ? 'text-blue-500' : ''"
                                     class="flex items-center w-full p-2  transition duration-75 rounded-lg pl-11 group hover:!text-blue-500 ">
                          {{ child.label }}
                        </router-link>
                      </li>
                    </ul>
                  </div>
                  <div v-else>
                    <a-divider orientation="left" orientation-margin="10px" class="!text-gray-400"
                               v-if="$appState.showMenu">
                      <span>{{ menu.label }}</span>
                    </a-divider>
                  </div>
                </li>
              </template>

            </ul>
          </div>

          <div class="pt-2 space-y-2 mt-auto">

            <a href="#/about" class="flex items-center p-2 text-gray-900 rounded-lg  hover:bg-gray-300  group">
              <svg
                class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 fill-gray-500"
                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path
                  d="M464 256A208 208 0 1 0 48 256a208 208 0 1 0 416 0zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zm169.8-90.7c7.9-22.3 29.1-37.3 52.8-37.3h58.3c34.9 0 63.1 28.3 63.1 63.1c0 22.6-12.1 43.5-31.7 54.8L280 264.4c-.2 13-10.9 23.6-24 23.6c-13.3 0-24-10.7-24-24V250.5c0-8.6 4.6-16.5 12.1-20.8l44.3-25.4c4.7-2.7 7.6-7.7 7.6-13.1c0-8.4-6.8-15.1-15.1-15.1H222.6c-3.4 0-6.4 2.1-7.5 5.3l-.4 1.2c-4.4 12.5-18.2 19-30.6 14.6s-19-18.2-14.6-30.6l.4-1.2zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z"/>
              </svg>
              <span class="flex-1 ml-3 whitespace-nowrap">Copyright</span>
            </a>
            <a @click="$auth.logout" href="#"
               class="flex items-center p-2 text-gray-900 rounded-lg  hover:bg-gray-300  group">
              <svg class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 "
                   aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 16">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3"></path>
              </svg>
              <span class="flex-1 ml-3 whitespace-nowrap">Logout</span>
            </a>
          </div>


        </div>
      </div>

    </div>
  </aside>
</template>
<style lang="scss" scoped>
#sidebar.collapsed {
  a :not(:first-child) {
    display: none;
  }

  button :not(:first-child) {
    display: none;
  }
}
</style>
