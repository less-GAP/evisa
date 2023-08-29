export const configRoutes = [{
  meta: {
    title: "Configs",
  },
  path: "/configs",
  name: "configs",
  component: () => import("@/views/configs/ConfigLayout.vue"),
  children: [
    {
      meta: {
        title: "General Configuration",
      },
      path: "/configs/general",
      name: "config-general",
      component: () => import("@/views/configs/GeneralConfig.vue"),
    },
    {
      meta: {
        title: "SMTP Configuration",
      },
      path: "/configs/smtp",
      name: "config-smtp",
      component: () => import("@/views/configs/SMTPConfig.vue"),
    },
    {
      meta: {
        title: "Config Country",
      },
      path: "/configs/data/country",
      name: "config-country",
      component: () => import("@/views/configs/country/index.vue"),
    },
    {
      meta: {
        title: "Config Processing Time",
      },
      path: "/configs/data/processing-time",
      name: "config-processing-time",
      component: () => import("@/views/configs/processing-time/index.vue"),
    },
  ]
}]
