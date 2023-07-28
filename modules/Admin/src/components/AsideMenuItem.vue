<script setup>
import {ref, computed} from "vue";
import {RouterLink} from "vue-router";
import {useStyleStore} from "@/stores/style.js";
import {mdiMinus, mdiPlus} from "@mdi/js";
import {getButtonColor} from "@/colors.js";
import BaseIcon from "@/components/BaseIcon.vue";
import AsideMenuList from "@/components/AsideMenuList.vue";

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
  props.isDropdownList ? "py-3 px-6 text-sm" : "py-3",
  hasColor.value
    ? getButtonColor(props.item.color, false, true)
    : `${styleStore.asideMenuItemStyle} dark:text-slate-300 dark:hover:text-white`,
]);

const hasDropdown = computed(() => !!props.item.menu);

const menuClick = (event) => {
  emit("menu-click", event, props.item);

  if (hasDropdown.value) {
    isDropdownActive.value = !isDropdownActive.value;
  }
};
</script>

<template>
  <li class="menu-item block mb-2 lg:mb-3 relative ">
    <component
      class="flex items-center px-4 py-2 text-left rounded-lg 2xl:rounded-2xl lg:p-4"
      :is="item.to ? RouterLink : 'a'"
      v-slot="vSlot"
      :to="item.to ?? null"
      :href="item.href ?? null"
      :target="item.target ?? null"
      :class="componentClass"
      @click="menuClick"
    >
      <BaseIcon
        v-if="item.icon"
        :path="item.icon"
        class="flex-none"
        :class="[vSlot && vSlot.isExactActive ? asideMenuItemActiveStyle : '']"
        :size="32"
      />
      <span
        class="pl-4 font-bold txt lg:pl-6 lg:text-lg"
        :class="[
          { 'pr-12': !hasDropdown },
          vSlot && vSlot.isExactActive ? asideMenuItemActiveStyle : '',
        ]"
      >{{ item.label }}</span
      >
      <BaseIcon
        v-if="hasDropdown"
        :path="isDropdownActive ? mdiMinus : mdiPlus"
        class="icon inline-block w-32 h-32 text-center"
        :class="[vSlot && vSlot.isExactActive ? asideMenuItemActiveStyle : '']"
        w="w-12"
      />
    </component>
    <AsideMenuList
      v-if="hasDropdown"
      :menu="item.menu"
      :class="[
        styleStore.asideMenuDropdownStyle,
        isDropdownActive ? 'block dark:bg-slate-800/50' : 'hidden',
      ]"
      is-dropdown-list
    />
  </li>
</template>
<style scoped>
.menu-item  > a  > * {
  cursor: pointer;
  color: #444A6D;
}
.menu-item >.router-link-active, .menu-item:hover > a {
  color: #fff;
  cursor: pointer;
  background: linear-gradient(122.97deg, #2CB34A 35.82%, #52BE3E 47.92%, #8DCE2C 67.09%, #BCDC1E 85.24%, #DEE514 100.37%, #F3EB0D 113.48%, #FAED0B 122.56%);
  box-shadow: 0px 20px 50px rgb(55 69 87 / 10%);
}

.menu-item .router-link-active *, .menu-item:hover > a > * {
  color: #fff;
}
</style>
