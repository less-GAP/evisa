import { createApp } from "vue";
import { createPinia } from "pinia";

import App from "./App.vue";
import router from "./router";
import { useMainStore } from "@/stores/main.js";
import { useStyleStore } from "@/stores/style.js";
import { darkModeKey, styleKey } from "@/config.js";

import "./css/main.css";
import 'ant-design-vue/dist/reset.css';

import {useAuthStore} from "@/stores/auth";
import piniaPersist from 'pinia-plugin-persist'
import Api from "@/utils/Api";
import {useTranslation} from "@/utils/Translation";
import Antd from 'ant-design-vue';

/* Init Pinia */
const pinia = createPinia();
pinia.use(piniaPersist)
/* Create Vue app */
const myApp = createApp(App).use(router).use(pinia)

/* Init Pinia stores */
const mainStore = useMainStore(pinia);
const styleStore = useStyleStore(pinia);
const authStore = useAuthStore();
const tranlation = useTranslation();
myApp.config.globalProperties.$auth = authStore;
myApp.config.globalProperties.$api = Api;
myApp.config.globalProperties.__ = tranlation.__;
myApp.use(Antd).mount("#app");
/* Fetch sample data */
// mainStore.fetch("clients");
// mainStore.fetch("history");

/* App style */
styleStore.setStyle(localStorage[styleKey] ?? "basic");

/* Dark mode */
if (
  (!localStorage[darkModeKey] &&
    window.matchMedia("(prefers-color-scheme: dark)").matches) ||
  localStorage[darkModeKey] === "1"
) {
  styleStore.setDarkMode(true);
}

/* Default title tag */
const defaultDocumentTitle = "";

/* Set document title from route meta */
router.afterEach((to) => {
  document.title = to.meta?.title
    ? `${to.meta.title} — ${defaultDocumentTitle}`
    : defaultDocumentTitle;
});
