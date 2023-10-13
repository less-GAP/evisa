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
    } ,
    {
      meta: {
        title: "Authenticate Configuration",
      },
      path: "/configs/auth",
      name: "config-auth",
      component: () => import("./AuthConfig.vue"),
    },{
      meta: {
        title: "Payment Configuration",
      },
      path: "/configs/payment",
      name: "config-payment",
      component: () => import("./PaymentConfig.vue"),
    }
  ]
}]
