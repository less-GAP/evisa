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
    },
    {
      meta: {
        title: "Posts Configuration",
      },
      path: "/configs/postspages",
      name: "config-postspages",
      component: () => import("./PostsConfig.vue"),
    },
    {
      meta: {
        title: "QuickBooks Configuration",
      },
      path: "/configs/quickbooks",
      name: "config-quickbooks",
      component: () => import("./QuickBooksConfig.vue"),
    },
    {
      meta: {
        title: "CloudFlare Configuration",
      },
      path: "/configs/cloudflare",
      name: "config-cloudflare",
      component: () => import("./CloudFlareConfig.vue"),
    },
    {
      meta: {
        title: "Google API Configuration",
      },
      path: "/configs/google",
      name: "config-google",
      component: () => import("./GoogleConfig.vue"),
    },
    {
      meta: {
        title: "Facebook API Configuration",
      },
      path: "/configs/facebook",
      name: "config-facebook",
      component: () => import("./FacebookConfig.vue"),
    },
    {
      meta: {
        title: "Marketing Configuration",
      },
      path: "/configs/marketing",
      name: "config-marketing",
      component: () => import("./MarketingConfig.vue"),
    },
    {
      meta: {
        title: "Social Configuration",
      },
      path: "/configs/social",
      name: "config-social",
      component: () => import("./SocialConfig.vue"),
    },
  ]
}]
