import Pages from "./../pages/index.vue";

let prefix = process.env.MIX_ADMIN_PANEL_ROUTE_PREFIX
  ? "/" + process.env.MIX_ADMIN_PANEL_ROUTE_PREFIX
  : "/badaso-dashboard";

export default [
  {
    path: prefix + "/commerce-theme-config",
    name: "CommerceThemeConfiguration",
    component: Pages,
    meta: {
      title: "Commerce Theme Configuration",
      useComponent: "AdminContainer"
    },
  },
  {
    path: prefix + "/commerce-theme-config/add",
    name: "CommerceThemeConfigurationAdd",
    component: Pages,
    meta: {
      title: "Add Commerce Theme Configuration",
      useComponent: "AdminContainer"
    },
  },
];
