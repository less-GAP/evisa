import {defineStore} from "pinia";
import Api from "@/utils/Api";
import router from "@/router";

export const useAuthStore = defineStore("auth", {
  state: () => ({
    /* User */
    user: null,

  }),
  actions: {
    setUser(user) {
      this.user = user
    },
    oneCharName(isFull) {
      const user = this.user

      if (user && user.full_name) {
        if (isFull) {
          return user.full_name;
        } else {
          const fullNameParts = user.full_name.split(" ");
          const lastWord = fullNameParts[fullNameParts.length - 1];
          if (lastWord.length > 0) {
            return lastWord.charAt(0);
          }
        }
      }
      return "N/A";
    },
    hasRole(role) {
      const user = this.user
      if (!user || user.role != role) {
        return false;
      }
      return true;
    },
    hasPermission(permission) {
      const user = this.user
      if (!permission || user.role == 'admin') {
        return true
      }
      return false
      // if (!user && permission) {
      //   return false;
      // }
      // if (!permission || user?.app_permissions?.includes('*')) {
      //   return true
      // }
      //
      // const checkArr = permission.split('.')
      // if (checkArr.length > 1) {
      //   return user.app_permissions.includes('*') || user.app_permissions.includes(permission) || user.app_permissions.includes(checkArr[0] + '.*');
      // }
      // return user.app_permissions.includes(permission+'.*') || user.app_permissions.includes(permission);
    },
    logout() {
      this.$reset()
      router.replace('login')
    },
    isLogin() {
      return this.user != null
    },
    async login(data) {
      const res = await Api
        .post(`auth/login`, data)
      this.setUser(res.data)
      return res;

    },

    fetch: function () {
      Api
        .get(`userInfo`)
        .then((r) => {
          console.log(r)
          // this.setUser(r.data)
        })
        .catch((error) => {
          alert(error.message);
        });
    },
  },
  persist: {
    enabled: true
  }
});
