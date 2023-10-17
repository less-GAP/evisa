export default [
  {
    meta: {
      title: "SMS",
    },
    path: "/sms",
    name: "sms",
    component: () => import("./index.vue"),
  },
  {
    meta: {
      title: "SMS Detail",
    },
    path: "/sms/:id",
    name: "sms-detail",
    component: () => import("./Detail.vue"),
  },
]
