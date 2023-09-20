<template>
  <a-config-provider v-bind="$style.antdv" :getPopupContainer="getPopupContainer">
    <c-reset/>
    <a-style-provider hash-priority="high">
      <router-view  v-slot="{ Component }">
        <transition>
          <keep-alive :max="5">
            <component :key="$route.fullPath" :is="Component"/>
          </keep-alive>
        </transition>
      </router-view>
    </a-style-provider>
  </a-config-provider>
</template>
<script>

export default {
  name: "App",
  methods: {
    getPopupContainer(el, dialogContext) {
      if (dialogContext) {
        return dialogContext.getDialogWrap();
      } else {
        return document.body;
      }
    },
  },
};

</script>
