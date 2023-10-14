export default [{
  meta: {
    title: "Master data",
  },
  path: "/master-data",
  name: "master-data",
  component: () => import("@/views/master-data/Layout.vue"),
  children: [
    {
      meta: {
        title: "Customer Level",
      },
      path: "/master-data/visa-customer-level",
      name: "visa-customer-level",
      component: () => import("./visa-customer-level/index.vue"),
      children: [
        {
          meta: {
            title: "Agency Level",
          },
          path: "/master-data/visa-customer-level/:id",
          name: "visa-customer-level-form",
          component: () => import("./visa-customer-level/form.vue"),
        }
      ]
    },

    {
      meta: {
        title: "Country",
      },
      path: "/master-data/country",
      name: "data-country",
      component: () => import("./country/index.vue"),
    },

    {
      meta: {
        title: "Processing Time",
      },
      path: "/master-data/processing-time",
      name: "processing-time",
      component: () => import("./processing-time/index.vue"),
    },
    {
      meta: {
        title: "Type of visa",
      },
      path: "/master-data/type-of-visa",
      name: "type-of-visa",
      component: () => import("./type-of-visa/index.vue"),
    },

  ]
}]
