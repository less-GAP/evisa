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
      title: "Đơn hàng",
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
      title: "List Videos",
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
      title: "Series Video",
    },
    path: "/series",
    name: "series",
    component: () => import("@/views/series/index.vue"),
  },
  {
    meta: {
      title: "Series Detail",
    },
    path: "/series/:id",
    name: "series-detail",
    component: () => import("@/views/series/SeriesView.vue"),
  },
  {
    meta: {
      title: "Danh sách khách hàng",
    },
    path: "/customers",
    name: "customers",
    component: () => import("@/views/customers/index.vue"),
  },
  {
    meta: {
      title: "Nhóm khách hàng",
    },
    path: "/customer-group",
    name: "customer-group",
    component: () => import("@/views/customer-group/index.vue"),
  },
  {
    meta: {
      title: "Nhóm khách hàng",
    },
    path: "/customer-group/:id",
    name: "customer-group-detail",
    component: () => import("@/views/customer-group/Detail.vue"),
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
      title: "Quốc gia",
    },
    path: "/countries",
    name: "countries",
    component: () => import("@/views/countries/index.vue"),
  },
  {
    meta: {
      title: "Thông tin quốc gia",
    },
    path: "/countries/:id",
    name: "country-detail",
    component: () => import("@/views/countries/Detail.vue"),
  },
  {
    meta: {
      title: "Tỉnh/Thành phố",
    },
    path: "/provinces",
    name: "provinces",
    component: () => import("@/views/provinces/index.vue"),
  },
  {
    meta: {
      title: "Thông tin tỉnh/thành phố",
    },
    path: "/provinces/:id",
    name: "provinces-detail",
    component: () => import("@/views/provinces/Detail.vue"),
  },
  {
    meta: {
      title: "Quận/huyện",
    },
    path: "/districts",
    name: "districts",
    component: () => import("@/views/districts/index.vue"),
  },
  {
    meta: {
      title: "Thông tin quận/huyện",
    },
    path: "/districts/:id",
    name: "districts-detail",
    component: () => import("@/views/districts/Detail.vue"),
  },
  {
    meta: {
      title: "Phường/xã",
    },
    path: "/wards",
    name: "wards",
    component: () => import("@/views/wards/index.vue"),
  },
  {
    meta: {
      title: "Thông tin phường/xã",
    },
    path: "/wards/:id",
    name: "wards-detail",
    component: () => import("@/views/wards/Detail.vue"),
  },
  {
    meta: {
      title: "Phương thức vận chuyển",
    },
    path: "/shipping-method",
    name: "shipping-method",
    component: () => import("@/views/shipping-method/index.vue"),
  },
  {
    meta: {
      title: "Phương thức vận chuyển",
    },
    path: "/shipping-method/:id",
    name: "shipping-method-detail",
    component: () => import("@/views/shipping-method/Detail.vue"),
  },
  {
    meta: {
      title: "Phương thức thanh toán",
    },
    path: "/payment-method",
    name: "payment-method",
    component: () => import("@/views/payment-method/index.vue"),
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
      title: "Configs",
    },
    path: "/configs",
    name: "configs",
    component: () => import("@/views/configs/ConfigLayout.vue"),
    children: [
      {
        meta: {
          title: "General Configuration",
        },
        path: "/configs/general",
        name: "config-general",
        component: () => import("@/views/configs/GeneralConfig.vue"),
      },
      {
        meta: {
          title: "SMTP Configuration",
        },
        path: "/configs/smtp",
        name: "config-smtp",
        component: () => import("@/views/configs/SMTPConfig.vue"),
      },
    ]
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
