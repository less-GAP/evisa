import {
  mdiAccountCircle,
  mdiMonitor,
  mdiGithub,
  mdiLock,
  mdiAlertCircle,
  mdiSquareEditOutline,
  mdiTable,
  mdiViewList,
  mdiTelevisionGuide,
  mdiResponsive,
  mdiPalette,
  mdiReact,
  mdiContacts,
} from "@mdi/js";

export default [
  {
    to: "/",
    icon: mdiMonitor,
    label: "Bảng điều khiển",
  },
  {
    to: "/orders",
    label: "Đơn hàng",
    icon: mdiViewList,
  },
  {
    to: "/products",
    label: "Sản phẩm",
    icon: mdiContacts,
  },

  {
    label: "Videos",
    icon: mdiViewList,
    menu: [
      {
        to: "/videos",
        label: "List Video",
      },
      {
        to: "/series",
        label: "Series Video",
      },
    ],
  },
  {
    label: "Khách hàng",
    icon: mdiViewList,
    menu: [
      {
        to: "/customers",
        label: "Danh sách khách hàng",
      },
      {
        to: "/customer-type",
        label: "Loại khách hàng",
      },
    ],
  },
  {
    to: "/users",
    label: "Người dùng",
    icon: mdiContacts,
  },

  // {
  //   to: "/forms",
  //   label: "Forms",
  //   icon: mdiSquareEditOutline,
  // },
  // {
  //   to: "/ui",
  //   label: "UI",
  //   icon: mdiTelevisionGuide,
  // },
  // {
  //   to: "/responsive",
  //   label: "Responsive",
  //   icon: mdiResponsive,
  // },
  // {
  //   to: "/",
  //   label: "Styles",
  //   icon: mdiPalette,
  // },
  // {
  //   to: "/profile",
  //   label: "Profile",
  //   icon: mdiAccountCircle,
  // },
  // {
  //   to: "/login",
  //   label: "Login",
  //   icon: mdiLock,
  // },
  // {
  //   to: "/error",
  //   label: "Error",
  //   icon: mdiAlertCircle,
  // },
  {
    label: "Cấu hình",
    icon: mdiViewList,
    menu: [
      {
        label: "Hệ thống",
      },
      {
        label: "Email",
      },
    ],
  },
  // {
  //   href: "https://github.com/justboil/admin-one-vue-tailwind",
  //   label: "GitHub",
  //   icon: mdiGithub,
  //   target: "_blank",
  // },
  // {
  //   href: "https://github.com/justboil/admin-one-react-tailwind",
  //   label: "React version",
  //   icon: mdiReact,
  //   target: "_blank",
  // },
];
