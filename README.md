<p align="center">
  <a href="https://badaso-docs.uatech.co.id/">
    <img src="https://i.ibb.co/Vq5hH9k/badaso-commerce-theme-logo.png" width="200px" alt="Badaso logo" />
  </a>
</p>
<h3 align="center">badaso/commerce-theme</h3>
<p align="center">Official e-commerce theme for badaso <a href="https://github.com/uasoft-indonesia/badaso-commerce-module">commerce module</a></p>
<p align="center"><a href="https://badaso-demo.uatech.co.id/commerce" target="_blank">Try live demo</a></p>
<br />

<p align="center">
<a href="https://github.styleci.io/repos/347838630"><img src="https://github.styleci.io/repos/347838630/shield" alt="Badaso StyleCI"></a>
<a href="https://packagist.org/packages/uasoft-indonesia/badaso"><img src="https://img.shields.io/packagist/dt/badaso/core" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/uasoft-indonesia/badaso"><img src="https://img.shields.io/packagist/v/badaso/core" alt="Latest Stable Version"></a>
</p>

<p align="center">
  <a href="https://badaso-docs.uatech.co.id/">
    <img src="https://i.ibb.co/mTdhq0T/Screen-Shot-2021-12-08-at-22-47-51.png" alt="screencapture-badaso-dashboard-uatech-co-id-dashboard-crud-2021-03-17-09-57-08-1" />
  </a>
</p>

## Installation
- Install badaso first with commerce module installed. After that, you can install the module with the following command.

```bash
composer require badaso/commerce-theme
```

- Run the following command to easily setup the theme.

```bash
php artisan migrate
php artisan badaso-commerce-theme:setup
composer dump-autoload
php artisan db:seed --class=BadasoCommerceThemeSeeder
```

- Add the plugins to your `MIX_BADASO_MODULES` to `.env`. If you have another plugins installed, include them using delimiter comma (,).

```
MIX_BADASO_MODULES=commerce-theme
```

- Add the plugins menu to your `MIX_BADASO_MENU` to `.env`. If you have another menu, include them using delimiter comma (,).

```
MIX_BADASO_MENU=admin,commerce-theme
```

- Fill the other variables in .env file.
  - `MIX_COMMERCE_WEB_ROUTE_PREFIX=commerce` Set prefix for the theme.
  - `CRON_EXPIRED_ORDER="*/5 * * * *"` Set the cron job to check for expired orders.

## Acknowledgements

- [TailwindCSS](https://tailwindcss.com/)
- [VocaJS](https://vocajs.com/)
