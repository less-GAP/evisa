export default [{
  meta: {
    title: "Visa",
  },
  path: "/visa/:action?",
  name: "visa",
  component: () => import("./Layout.vue"),
  children: [
    {
      meta: {
        title: "Visa List",
      },
      path: "/visa-:status",
      name: "visa-list",
      component: () => import("./PendingVisa.vue"),
    },
  ]
}]
