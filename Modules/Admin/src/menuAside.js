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
  mdiChartAreasplineVariant
} from "@mdi/js";

export default [
  {
    to: "/",
    icon: mdiViewDashboard,
    label: "Dashboard",
  },

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
    permission: "Content.mainMenu",

    icon: mdiViewWeek,
  },
  {
    to: "/content-management/menu/footer-menu",
    label: "Footer Menu",
    permission: "Content.footerMenu",
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
    permission: "Marketing",
  },
  {
    to: "/email-histories",
    label: "Email Histories",
    permission: 'Marketing.Email',

    // permission: "EmailHistories.menu",
    // disable: false,
    icon: mdiMessageText,
  },
  {
    to: "/sms",
    label: "SMS",
    permission: 'Marketing.SMS',

    // permission: "SMS.menu",
    icon: mdiEmail,
  },
  {
    to: "/report",
    label: "Report",
    permission: 'Marketing.report',

    // permission: "Report.menu",
    icon: mdiChartAreasplineVariant,
    // disable: true,
  },
  {
    to: null,
    permission: 'System',
    label: "System",
  },
  // TODO: Hi Phương em thêm mấy cái tính năng này vô hệ thống nha (copy từ đryce)
  {
    to: "/files",
    label: "File Manager",
    permission: 'System.file',
    icon: mdiImageMultiple,
  },
  {
    to: "/user",
    permission: 'System.user',
    label: "User",
    icon: mdiAccountMultiple,
  },
  {
    to: "/email",
    permission: 'System.email',
    label: "Email",
    icon: mdiMessageText,
  },
  {
    to: null,
    permission: 'Platform',
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
