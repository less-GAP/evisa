import {createRouter, createWebHashHistory} from "vue-router";
import Style from "@/views/StyleView.vue";
import Home from "@/views/HomeView.vue";
import {useAuthStore} from "@/stores/auth";
import {useAppStateStore} from "@/stores/appState";

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
      title: "Orders",
    },
    path: "/orders",
    name: "orders",
    component: () => import("@/views/orders/index.vue"),
  },
  {
    meta: {
      title: "Products",
    },
    path: "/products",
    name: "products",
    component: () => import("@/views/products/index.vue"),
  },
  {
    meta: {
      title: "Product Detail",
    },
    path: "/products/:id",
    name: "product-detail",
    component: () => import("@/views/products/ProductView.vue"),
  },
  {
    meta: {
      title: "Videos",
    },
    path: "/videos",
    name: "videos",
    component: () => import("@/views/videos/index.vue"),
  },
  {
    meta: {
      title: "Video Detail",
    },
    path: "/videos/:id",
    name: "video-detail",
    component: () => import("@/views/videos/VideoView.vue"),
  },
  {
    meta: {
      title: "Series",
    },
    path: "/series",
    name: "series",
    component: () => import("@/views/series/index.vue"),
  },
  {
    meta: {
      title: "Customers",
    },
    path: "/customers",
    name: "customers",
    component: () => import("@/views/customers/index.vue"),
  },
  {
    meta: {
      title: "Customer type",
    },
    path: "/customer-type",
    name: "customer-type",
    component: () => import("@/views/customer-type/index.vue"),
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
      title: "Medias",
    },
    path: "/medias",
    name: "medias",
    component: () => import("@/views/medias/index.vue"),
  },
  {
    meta: {
      title: "Configs",
    },
    path: "/configs",
    name: "configs",
    component: () => import("@/views/configs/index.vue"),
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
