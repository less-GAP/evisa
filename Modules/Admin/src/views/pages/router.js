export default [
  {
    meta: {
      title: "Pages",
    },
    path: "/page",
    name: "page",
    component: () => import("./index.vue"),
    children: [
      {
        meta: {
          title: "Page Detail",
        },
        path: "/page/:id",
        name: "page-detail",
        component: () => import("./Detail.vue"),
      }
    ]
  },
]
