export default [
  {
    meta: {
      title: "Contacts",
    },
    path: "/contact",
    name: "contact",
    component: () => import("./index.vue"),
    children: [
      {
        meta: {
          title: "Contact Detail",
        },
        path: "/contact/:id",
        name: "contact-detail",
        component: () => import("./Detail.vue"),

      }
    ]
  }

]
