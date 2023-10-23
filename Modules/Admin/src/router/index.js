import {createRouter, createWebHashHistory} from "vue-router";
import Home from "@/views/HomeView.vue";
import {useAuthStore} from "@/stores/auth";
import {useAppStateStore} from "@/stores/appState";

const publicPages = ['/login'];

let routes = [
  {
    meta: {
      title: "Dashboard",
    },
    path: "/dashboard",
    name: "dashboard",
    component: Home,
  },
  {
    // meta: {
    //   title: "Dashboard",
    // },
    path: "/",
    name: "home",
    component: Home,
  },
  {
    meta: {
      title: "File Manager",
    },
    path: "/files",
    name: "files",
    component: () => import("@/views/files/index.vue"),
  },

  {
    meta: {
      title: "Profile",
    },
    path: "/user/profile",
    name: "user-profile",
    component: () => import("@/views/users/ProfileView.vue"),
  },

  {
    meta: {
      title: "Emails",
    },
    path: "/emails",
    name: "emails",
    component: () => import("@/views/emails/EmailLayout.vue"),
    children: [
      {
        meta: {
          title: "Email Templates",
        },
        path: "/email/templates",
        name: "email-templates",
        component: () => import("@/views/emails/indexTemplates.vue"),
      },
      {
        meta: {
          title: "Email Templates",
        },
        path: "/email/templates/form/:id?",
        name: "email-templates-form",
        component: () => import("@/views/emails/FormEmailTemplate.vue"),
      },
      {
        meta: {
          title: "Email History",
        },
        path: "/email/history",
        name: "email-history",
        component: () => import("@/views/emails/indexHistory.vue"),
      },
    ]
  },
  {
    meta: {
      title: "User Detail",
    },
    path: "/users/:id",
    name: "user-detail",
    component: () => import("@/views/users/ProfileView.vue"),
  },

  {
    meta: {
      title: "Profile",
    },
    path: "/profile",
    name: "profile",
    component: () => import("@/views/ProfileView.vue"),
  },

  {
    meta: {
      title: "Login",
      isPublic: true,
    },
    path: "/login",
    name: "login",
    component: () => import("@/views/LoginView.vue"),
  },
  {
    meta: {
      title: "Error",
    },
    path: "/error",
    name: "error",
    component: () => import("@/views/ErrorView.vue"),
  }
];
const modules = import.meta.globEager('./../views/**/router.js');

Object.keys(modules).forEach((key) => {
  const mod = modules[key].default || {};
  routes = [...routes, ...mod]
});

const router = createRouter({
  history: createWebHashHistory(),
  routes,
  scrollBehavior(to, from, savedPosition) {
    return savedPosition || {top: 0};
  },
});
router.beforeEach(async (to) => {
  // redirect to login page if not logged in and trying to access a restricted page
  const auth = useAuthStore();

  if (!to.meta.isPublic && !auth.isLogin()) {
    auth.returnUrl = to.fullPath;
    return '/login';
  }
  useAppStateStore().setTitle(to.meta.title)
  useAppStateStore().setRoute(to)
});
export default router;
