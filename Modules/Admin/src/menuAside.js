// https://pictogrammers.com/library/mdi/
import {
  mdiCog,
  mdiAccountMultiple,
  mdiDatabase,
  mdiAccountGroupOutline,
  mdiBookOpenOutline,
  mdiFileDocumentMultipleOutline
} from "@mdi/js";

export default [

  {
    to: "/visa/pending-preview",
    label: "Visa Applications",
    icon: mdiFileDocumentMultipleOutline,
  },
  {
    to: "/customer",
    label: "Customers",
    icon: mdiAccountGroupOutline,
  },
  {
    label: "Content",
    icon: mdiBookOpenOutline,
    children: [{
      to: "/content-management/page",
      label: "Page"
    },
      {
        to: "/content-management/post",
        label: "Post",
      },
      {
        to: "/content-management/faq",
        label: "Faq",
      },
      {
        to: "/content-management/menu/site-menu",
        label: "Main Menu",
      },
      {
        to: "/content-management/menu/footer-menu",
        label: "Footer Menu",
      },
    ],
  },

  {
    to: null,
    label: "System",
  },
  {
    to: "/user",
    label: "User",
    icon: mdiAccountMultiple,
  },

  {
    to: null,
    label: "Platform",
  },
  {
    permission: 'masterData.list',
    label: "Master Data",
    icon: mdiDatabase,
    to: "/master-data/visa-customer-level",
  },
  {
    permission: 'config.list',
    label: "System Config",
    icon: mdiCog,
    to: "/configs/general",
  }
];
