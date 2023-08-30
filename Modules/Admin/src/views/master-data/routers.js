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
  ]
}]
