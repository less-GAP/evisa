export default [{
  meta: {
    title: "CMS",
  },
  path: "/content-management",
  name: "content-management",
  component: () => import("./Layout.vue"),
  redirect: "/content-management/page",
  children: [
    {
      meta: {
        title: "Pages",
      },
      path: "/content-management/page",
      name: "cms-page",
      component: () => import("./page/index.vue"),

    },
    {
      meta: {
        title: "Pages",
      },
      path: "/content-management/page/:id",
      name: "cms-page-detail",
      component: () => import("./page/Detail.vue"),
    },
    {
      meta: {
        title: "Posts",
      },
      path: "/content-management/post",
      name: "content-management-post",
      component: () => import("./post/index.vue"),

    },

    {
      meta: {
        title: "Posts",
      },
      path: "/content-management/post/:id",
      name: "content-management-post-detail",
      component: () => import("./post/Detail.vue"),
    },
    {
      meta: {
        title: "Faqs",
      },
      path: "/content-management/faq",
      name: "content-management-faq",
      component: () => import("./faq/index.vue"),

    },
    {
      meta: {
        title: "Faqs",
      },
      path: "/content-management/faq/:id",
      name: "content-management-faq-detail",
      component: () => import("./faq/Detail.vue"),
    },
    {
      meta: {
        title: "Menus",
      },
      path: "/content-management/menu/:id",
      name: "content-management-menu",
      component: () => import("./menu/index.vue"),
    },

  ]
}]
