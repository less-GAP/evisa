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
        title: "Agency Level",
      },
      path: "/master-data/agency-level",
      name: "agency-level",
      component: () => import("./agency-level/index.vue"),
      children: [
        {
          meta: {
            title: "Agency Level",
          },
          path: "/master-data/agency-level/:id",
          name: "agency-level-form",
          component: () => import("./agency-level/form.vue"),
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
      name: "data-processing-time",
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
