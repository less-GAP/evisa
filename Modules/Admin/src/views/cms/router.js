export default [{
  meta: {
    title: "CMS",
  },
  path: "/content-management",
  name: "content-management",
  redirect:"/content-management/page",
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
        title: "Posts",
      },
      path: "/content-management/post",
      name: "content-management-post",
      component: () => import("./post/index.vue"),
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
