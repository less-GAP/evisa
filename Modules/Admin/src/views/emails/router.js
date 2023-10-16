export default [
  {
    meta: {
      title: "Email History",
    },
    path: "/email-histories",
    name: "email-history",
    component: () => import("./indexHistory.vue"),
    children: [
      {
        meta: {
          title: "Email History",
        },
        path: "/email-histories/:id",
        name: "email-history-detail",
        component: () => import("./EmailDetail.vue"),

      }
    ]
  },
  {
    meta: {
      title: "Emails",
    },
    name: "email",
    path: "/email",
    redirect:'/email/templates',
    component: () => import("./EmailLayout.vue"),
    children: [{
      meta: {
        title: "Email Templates",
      },
      path: "/email/templates",
      name: "email-templates",
      component: () => import("./indexTemplates.vue"),
      children: [
        {
          meta: {
            title: "Email Templates",
          },
          path: "/email/templates/:id/:type?",
          name: "email-templates-form",
          component: () => import("./FormEmailTemplate.vue"),
        },
      ]
    },


      {
        meta: {
          title: "Email Config",
        },
        path: "/email/config",
        name: "email-config",
        component: () => import("./EmailConfig.vue"),

      },
    ]
  }

]
