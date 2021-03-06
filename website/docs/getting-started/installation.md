---
sidebar_position: 1
---

# Installation

1. Install [Badaso](https://github.com/uasoft-indonesia/badaso) first with [Badaso commerce module](https://github.com/uasoft-indonesia/badaso-commerce-theme) installed. After that, you can install the module with the following command.

```bash
composer require badaso/commerce-theme
```

2. Run the following command to easily setup the theme.

```bash
php artisan migrate
php artisan badaso-commerce-theme:setup
composer dump-autoload
php artisan db:seed --class=BadasoCommerceThemeSeeder
```

3. Add the plugins to your `MIX_BADASO_MODULES` to `.env`. If you have another plugins installed, include them using delimiter comma (,).

```
MIX_BADASO_MODULES=commerce-theme
```

4. Add the plugins menu to your `MIX_BADASO_MENU` to `.env`. If you have another menu, include them using delimiter comma (,).

```
MIX_BADASO_MENU=admin,commerce-theme
```

5. Fill the other variables in .env file.
    - `MIX_COMMERCE_WEB_ROUTE_PREFIX=commerce` Set prefix for the theme.
    - `CRON_EXPIRED_ORDER="*/5 * * * *"` Set the cron job to check for expired orders.

## Acknowledgements

- [TailwindCSS](https://tailwindcss.com/)
- [VocaJS](https://vocajs.com/)