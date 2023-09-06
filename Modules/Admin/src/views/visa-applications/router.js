export default [{
  meta: {
    title: "Visa",
  },
  path: "/visa/:status?",
  name: "visa",
  component: () => import("./Layout.vue"),
  children: [
    {
      meta: {
        title: "Visa Detail",
      },
      path: "/visa/:status/:id",
      name: "visa-detail",
      component: () => import("./ViewDetail.vue"),
    },
  ]
}]
