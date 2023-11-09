import {defineStore} from "pinia";

export const useAppStateStore = defineStore("appState", {
  state: () => ({
    /* User */
    showMenu: false,
    editorKey: '2c5rncvvtuwvyq0lh4pr2bbdn16kuioel1id6anpe1oiulm7',
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
