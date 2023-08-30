import {createRouter, createWebHashHistory} from "vue-router";
import Style from "@/views/StyleView.vue";
import Home from "@/views/HomeView.vue";
import {useAuthStore} from "@/stores/auth";
import {useAppStateStore} from "@/stores/appState";
import configRoutes from "@/views/configs/routers";
import masterDataRoutes from "@/views/master-data/routers";
import visaRoutes from "@/views/visa-applications/routers";

const publicPages = ['/login'];

const routes = [
  {
    meta: {
      title: "Dashboard",
    },
    path: "/",
    name: "dashboard",
    component: Home,
  },
  {
    meta: {
      title: "Posts",
    },
    path: "/post",
    name: "post",
    component: () => import("@/views/posts/index.vue"),
    children: [
      {
        meta: {
          title: "Posts",
        },
        path: "/post/:id",
        name: "post-detail",
        component: () => import("@/views/posts/Detail.vue"),
      }
    ]
  },
  {
    meta: {
      title: "Users",
    },
    path: "/users",
    name: "users",
    component: () => import("@/views/users/index.vue"),
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
      title: "Phương thức thanh toán",
    },
    path: "/payment-method/:id",
    name: "payment-method-detail",
    component: () => import("@/views/payment-method/Detail.vue"),
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
  },
  ...configRoutes,
  ...visaRoutes,
  ...masterDataRoutes
];

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
});
export default router;
