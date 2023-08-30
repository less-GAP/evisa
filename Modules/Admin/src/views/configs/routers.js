export default [{
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
    }
  ]
}]
