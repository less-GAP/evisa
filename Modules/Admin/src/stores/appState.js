import {defineStore} from "pinia";

export const useAppStateStore = defineStore("appState", {
  state: () => ({
    /* User */
    showMenu: false,
    menuCollapsed: false,
    title: '',
    currentRoute: {},

  }),
  actions: {
    setTitle(title) {
      this.title = title
    },
    setRoute(curentRoute) {
      this.currentRoute = curentRoute
    }
  },
  persist: {
    enabled: true
  }
});
