// https://pictogrammers.com/library/mdi/
import {
  mdiCog,
  mdiContacts,
  mdiAccountMultiple,
  mdiDatabase,
  mdiMessageText,
  mdiAccountGroupOutline,
  // mdiBookOpenOutline,
  mdiFileDocumentMultipleOutline,
  mdiNoteText,
  mdiViewDashboard,
  mdiBookOpenPageVariant,
  mdiTooltipQuestion,
  mdiImageMultiple,
  mdiViewWeek,
  mdiEmail,
  // mdiChartAreasplineVariant
} from "@mdi/js";

export default [
  {
    to: "/dashboard",
    icon: mdiViewDashboard,
    label: "Dashboard",
  },
  {
    to: "/visa/",
    label: "Visa Applications",
    icon: mdiFileDocumentMultipleOutline,
  },
  {
    to: "/customer",
    label: "Customers",
    icon: mdiAccountGroupOutline,
  },
  {
    to: "/content-management/post",
    label: "Posts",
    icon: mdiNoteText,
  },
  {
    to: "/content-management/page",
    label: "Pages",
    icon: mdiBookOpenPageVariant,
  },

  {
    to: "/content-management/faq",
    label: "FAQs",
    icon: mdiTooltipQuestion,
  },
  {
    to: "/content-management/menu/site-menu",
    label: "Main Menu",
    icon: mdiViewWeek,
  },
  {
    to: "/content-management/menu/footer-menu",
    label: "Footer Menu",
    icon: mdiViewWeek,
  },
  {
    to: "/contact",
    label: "Contacts",
    icon: mdiContacts,
  },
  // {
  //   label: "Content",
  //   icon: mdiBookOpenOutline,
  //   children: [{
  //     to: "/content-management/page",
  //     label: "Page"
  //   },
  //     {
  //       to: "/content-management/post",
  //       label: "Post",
  //     },
  //     {
  //       to: "/content-management/faq",
  //       label: "Faq",
  //     },
  //     {
  //       to: "/content-management/menu/site-menu",
  //       label: "Main Menu",
  //     },
  //     {
  //       to: "/content-management/menu/footer-menu",
  //       label: "Footer Menu",
  //     },
  //   ],
  // },
  // TODO: Hi Phương em thêm mấy cái tính năng này vô hệ thống nha (copy từ đryce)
  {
    to: null,
    label: "Marketing",
    permission: "Marketing.menu",
  },
  {
    to: "/email-histories",
    label: "Email Histories",
    // permission: "EmailHistories.menu",
    // disable: false,
    icon: mdiMessageText,
  },
  {
    to: "/sms",
    label: "SMS",
    // permission: "SMS.menu",
    icon: mdiEmail,
  },
  // {
  //   to: "/report",
  //   label: "Report",
  //   // permission: "Report.menu",
  //   icon: mdiChartAreasplineVariant,
  //   // disable: true,
  // },
  {
    to: null,
    label: "System",
  },
  // TODO: Hi Phương em thêm mấy cái tính năng này vô hệ thống nha (copy từ đryce)
  {
    to: "/files",
    label: "File Manager",
    icon: mdiImageMultiple,
  },
  {
    to: "/user",
    label: "User",
    icon: mdiAccountMultiple,
  },
  {
    to: "/email",
    permission: 'email.list',
    label: "Email",
    icon: mdiMessageText,
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
