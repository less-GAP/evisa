export default [
  {
    meta: {
      title: "Emails",
    },
    path: "/email",
    name: "email",
    redirect: '/email/history',
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
          path: "/email/templates/:id",
          name: "email-templates-form",
          component: () => import("./FormEmailTemplate.vue"),

        }
      ]
    },

      {
        meta: {
          title: "Email History",
        },
        path: "/email/history",
        name: "email-history",
        component: () => import("./indexHistory.vue"),
        children: [
          {
            meta: {
              title: "Email History",
            },
            path: "/email/history/:id",
            name: "email-history-detail",
            component: () => import("./EmailDetail.vue"),

          }
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
