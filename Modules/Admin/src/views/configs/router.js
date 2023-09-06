export default [{
  meta: {
    title: "Configs",
  },
  path: "/configs",
  name: "configs",
  component: () => import("./ConfigLayout.vue"),
  children: [
    {
      meta: {
        title: "General Configuration",
      },
      path: "/configs/general",
      name: "config-general",
      component: () => import("./GeneralConfig.vue"),
    },
    {
      meta: {
        title: "SMTP Configuration",
      },
      path: "/configs/smtp",
      name: "config-smtp",
      component: () => import("./SMTPConfig.vue"),
    }
  ]
}]
