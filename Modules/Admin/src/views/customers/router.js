export default [
  {
    meta: {
      title: "Customers",
    },
    path: "/customer",
    name: "customer",
    component: () => import("./index.vue"),
    children: [
      {
        meta: {
          title: "Customer Detail",
        },
        path: "/customer/:id",
        name: "customer-detail",
        component: () => import("./Form.vue"),
      }
    ]
  },
]
