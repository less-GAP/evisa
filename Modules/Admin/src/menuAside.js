import {
  mdiMonitor,
  mdiCartOutline,
  mdiArchiveOutline,
  mdiVideoOutline,
  mdiAccountSupervisorOutline,
  mdiAccountCircleOutline,
  mdiImageMultiple,
  mdiCogOutline,
  mdiMapMarkerOutline,
  mdiCarOutline,
  mdiCreditCardOutline
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
    icon: mdiCartOutline,
  },
  {
    to: "/products",
    label: "Sản phẩm",
    icon: mdiArchiveOutline,
  },

  {
    label: "Videos",
    icon: mdiVideoOutline,
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
    icon: mdiAccountSupervisorOutline,
    menu: [
      {
        to: "/customers",
        label: "Danh sách khách hàng",
      },
      {
        to: "/customer-group",
        label: "Nhóm khách hàng",
      },
    ],
  },
  {
    to: "/users",
    label: "Người dùng",
    icon: mdiAccountCircleOutline,
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
    label: "File Manager",
    icon: mdiImageMultiple,
    to: "/files",
  },
  {
    label: "Vị trí",
    icon: mdiMapMarkerOutline,
    menu: [
      {
        to: "/countries",
        label: "Quốc gia",
      },
      {
        to: "/provinces",
        label: "Tỉnh/Thành phố",
      },
      {
        to: "/districts",
        label: "Quận/Huyện",
      },
      {
        to: "/wards",
        label: "Phường/xã",
      },
    ],
  },
  {
    label: "Vận chuyển",
    icon: mdiCarOutline,
    to: "/shipping-method",
  },{
    label: "Thanh toán",
    icon: mdiCreditCardOutline,
    to: "/payment-method",
  },

  {
    label: "Cấu hình",
    icon: mdiCogOutline,
    // to: "/configs/general",
    menu: [
      {
        to: "/configs/general",
        label: "Cấu hình chung",
      },
      {
        to: "/email/templates",
        label: "Email",
      } ,
      {
        to: "/invoice/templates",
        label: "Invoice",
      }

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
