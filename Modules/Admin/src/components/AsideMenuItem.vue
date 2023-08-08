<script setup>
import {ref, computed} from "vue";
import {RouterLink} from "vue-router";
import {useStyleStore} from "@/stores/style.js";
import {mdiChevronDown, mdiMinus, mdiPlus} from "@mdi/js";
import {getButtonColor} from "@/colors.js";
import BaseIcon from "@/components/BaseIcon.vue";
import AsideMenuList from "@/components/AsideMenuList.vue";
import {useAppStateStore} from "@/stores/appState";
import router from "@/router";

const props = defineProps({
  item: {
    type: Object,
    required: true,
  },
  isDropdownList: Boolean,
});

const emit = defineEmits(["menu-click"]);

const styleStore = useStyleStore();

const hasColor = computed(() => props.item && props.item.color);

const asideMenuItemActiveStyle = computed(() =>
  hasColor.value ? "" : styleStore.asideMenuItemActiveStyle
);

const isDropdownActive = ref(false);

const componentClass = computed(() => [
  !useAppStateStore().menuCollapsed ? "flex" : "flex xl:inline-flex",
  props.isDropdownList ? "py-3 px-6 text-sm" : "py-3",
  hasColor.value
    ? getButtonColor(props.item.color, false, true)
    : `${styleStore.asideMenuItemStyle} dark:text-slate-300 dark:hover:text-white`,
]);

const hasDropdown = computed(() => !!props.item.menu);
const hasActiveChildren = computed(() => {
  if(props.item.menu && props.item.menu.length && router.currentRoute){
    return props.item.menu.filter(item=>{
      return router.currentRoute.value.path.includes(item.to || item.path)
    }).length
  }
  return false
});

const menuClick = (event) => {
  if (hasDropdown.value) {
    useAppStateStore().menuCollapsed = false
    isDropdownActive.value = !isDropdownActive.value;
    return;
  }
  useAppStateStore().showMenu = false

  emit("menu-click", event, props.item);


};

</script>

<template>
  <li class="menu-item top-menu-item block mb-2 lg:mb-3 relative ">
    <component
      class=" items-center px-4 py-2 text-left rounded-lg 2xl:rounded-2xl lg:p-4"
      :is="item.to ? RouterLink : 'a'"
      v-slot="vSlot"
      :to="item.to ?? null"
      :href="item.href ?? null"
      :target="item.target ?? null"
      :class="[componentClass,hasActiveChildren?'router-link-active':'']"
      @click="menuClick"
    >
      <BaseIcon
        v-if="item.icon"
        :path="item.icon"
        class="flex-none"
        :class="[vSlot && vSlot.isExactActive ? asideMenuItemActiveStyle : '']"
        :w="'w-'+$style.menu.iconSize"
        :size="$style.menu.iconSize"
      />
      <span
        class="pl-4 font-bold txt lg:pl-6 lg:text-lg"
        :class="[
          { 'pr-12': !hasDropdown },
          !$appState.menuCollapsed?'':'xl:hidden',
          vSlot && vSlot.isExactActive ? asideMenuItemActiveStyle : '',
        ]"
      >{{ item.label }}</span
      >
      <span v-if="hasDropdown"
            :class="!$appState.menuCollapsed?'':'xl:hidden'"
            class="toggle-menu absolute right-4 top-3 lg:top-5 cursor-pointer flex items-center justify-center w-6 h-6">
          <BaseIcon
            :path="mdiChevronDown"
            class="flex-none"
            :class="[vSlot && vSlot.isExactActive ? asideMenuItemActiveStyle : '']"
            :size="32"
          />
      </span>
    </component>
    <ul v-show="isDropdownActive || hasActiveChildren" :class=" !$appState.menuCollapsed?'':'xl:hidden'" v-if="hasDropdown" class="list-none overflow-hidden menu-child px-4">
      <li v-for="child in item.menu" :class="[vSlot && vSlot.isExactActive ? asideMenuItemActiveStyle : '']"
          class="menu-item block  mt-3">
        <component
          class="flex items-center px-3 py-2 text-left rounded-lg overflow-hidden relative "
          :is="child.to ? RouterLink : 'a'"
          v-slot="vSlot"
          :to="child.to ?? null"
          :href="child.href ?? null"
          :target="child.target ?? null"
          :class="componentClass"
          @click="menuClick"
        >
          <span class="txt text-[#757575] text-sm pl-5">{{ child.label }}</span>
        </component>
      </li>

    </ul>

  </li>
</template>
<style lang="scss" scoped>
.menu-item > a > * {
  cursor: pointer;
  color: #444A6D;
}

.top-menu-item > .router-link-active, .top-menu-item > a:hover {
  color: #fff;
  cursor: pointer;
  background: linear-gradient(122.97deg, #2CB34A 35.82%, #52BE3E 47.92%, #8DCE2C 67.09%, #BCDC1E 85.24%, #DEE514 100.37%, #F3EB0D 113.48%, #FAED0B 122.56%);
  box-shadow: 0px 20px 50px rgb(55 69 87 / 10%);
}

.top-menu-item .router-link-active *, .top-menu-item > a:hover > * {
  color: #fff;
}

.menu-child > li > a {
  background: transparent !important;
}

.menu-child > li > a:hover ,.menu-child > li > a.router-link-active{
  background:  #ecebe9 !important;
}

.menu-child  .router-link-active *, .menu-child  > a:hover > * {
  color: #444A6D !important;
}
.menu-child > li > a:hover::before, .menu-child > li > a.router-link-active::before {
  background-color: #2CB34A;

}

.menu-child > li > a::before {
  content: "";
  display: block;
  width: 8px;
  height: 8px;
  border-radius: 50%;
  background-color: #A1A5B6;
  position: absolute;
  left: 12px;
  top: 50%;
  transform: translateY(-50%);
}
</style>
