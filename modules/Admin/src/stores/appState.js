import { defineStore } from "pinia";

export const useAppStateStore = defineStore("appState", {
  state: () => ({
    /* User */
    showMenu: false,
    menuCollapsed: false,
    title: '',

  }),
  actions: {
    setTitle(title){
      this.title = title
    }
  },
  persist: {
  }
});
