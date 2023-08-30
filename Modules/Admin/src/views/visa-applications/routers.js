export default [{
  meta: {
    title: "Visa",
  },
  path: "/visa",
  name: "visa",
  component: () => import("./Layout.vue"),
  children: [
    {
      meta: {
        title: "Visa List",
      },
      path: "/visa/:status",
      name: "visa-pending",
      component: () => import("./PendingVisa.vue"),
    },

  ]
}]
