export default [
  {
    meta: {
      title: "Users",
    },
    path: "/user",
    name: "users",
    component: () => import("./index.vue"),
    children: [
      {
        meta: {
          title: "Users Detail",
        },
        path: "/user/:id",
        name: "user-detail",
        component: () => import("./FormUser.vue"),
      }
    ]
  },
]
