// @ts-check
// Note: type annotations allow type checking and IDEs autocompletion

const lightCodeTheme = require("prism-react-renderer/themes/github");
const darkCodeTheme = require("prism-react-renderer/themes/dracula");

/** @type {import('@docusaurus/types').Config} */
const config = {
  title: "Badaso Commerce Theme Documentation",
  tagline: "Badaso commerce theme official documentation",
  url: "https://badaso-commerce-theme.uatech.co.id",
  baseUrl: "/",
  onBrokenLinks: "throw",
  onBrokenMarkdownLinks: "warn",
  favicon: "img/favicon.ico",
  organizationName: "uasoft-indonesia", // Usually your GitHub org/user name.
  projectName: "badaso-commerce-theme", // Usually your repo name.
  trailingSlash: false,

  i18n: {
    defaultLocale: "en",
    locales: ["en", "id"],
  },

  presets: [
    [
      "classic",
      /** @type {import('@docusaurus/preset-classic').Options} */
      ({
        docs: {
          sidebarPath: require.resolve("./sidebars.js"),
          // Please change this to your repo.
          editUrl: "https://github.com/uasoft-indonesia/badaso-commerce-theme/edit/main/website/",
          routeBasePath: "/",
        },
        blog: {
          showReadingTime: true,
          // Please change this to your repo.
          editUrl:
            "https://github.com/uasoft-indonesia/badaso-commerce-theme/edit/main/website/blog",
        },
        theme: {
          customCss: require.resolve("./src/css/custom.css"),
        },
      }),
    ],
  ],

  themeConfig:
    /** @type {import('@docusaurus/preset-classic').ThemeConfig} */
    ({
      navbar: {
        title: "Badaso commerce Theme",
        logo: {
          alt: "Badaso commerce Theme Logo",
          src: "img/badaso-module-logo.png",
        },
        items: [
          // {
          //   type: "doc",
          //   docId: "introduction",
          //   position: "left",
          //   label: "Tutorial",
          // },

          {
            type: "localeDropdown",
            position: "right",
          },

          {
            href: "https://github.com/uasoft-indonesia/badaso-commerce-theme",
            label: "GitHub",
            position: "right",
          },
        ],
      },
      footer: {
        style: "dark",
        links: [
          {
            title: "Learn",
            items: [
              {
                label: "Introduction",
                to: "/",
              },
              {
                label: "Installation",
                to: "/getting-started/installation",
              },
            ],
          },
          {
            title: "Community",
            items: [
              {
                label: "Facebook",
                href: "https://www.facebook.com/groups/badaso",
              },
              {
                label: "Telegram",
                href: "https://t.me/badaso_developers",
              },
            ],
          },
          {
            title: "More",
            items: [
              {
                label: "Donation",
                to: "https://opencollective.com/badaso",
              },
            ],
          },
        ],
        copyright: `Copyright © ${new Date().getFullYear()} UASOFT. All right reserved`,
      },
      prism: {
        theme: lightCodeTheme,
        darkTheme: darkCodeTheme,
      },
    }),
};

module.exports = config;
