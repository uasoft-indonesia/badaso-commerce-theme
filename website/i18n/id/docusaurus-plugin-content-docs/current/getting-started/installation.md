---
sidebar_position: 1
---

# Installation

1. Install [Badaso](https://github.com/uasoft-indonesia/badaso) dengan modul [Badaso commerce module](https://github.com/uasoft-indonesia/badaso-commerce-theme) diinstal. Setelah itu, Anda dapat menginstal modul dengan perintah berikut.
```bash
composer require badaso/commerce-theme
```

2.Jalankan perintah berikut untuk mengatur tema dengan mudah.

```bash
php artisan migrate
php artisan badaso-commerce-theme:setup
composer dump-autoload
php artisan db:seed --class=BadasoCommerceThemeSeeder
```

3. Tambahkan plugin ke `MIX_BADASO_MODULES` Anda ke `.env`. Jika Anda memiliki plugin lain yang diinstal, sertakan plugin tersebut menggunakan koma pembatas (,).

```
MIX_BADASO_MODULES=commerce-theme
```

4. Tambahkan menu plugin ke `MIX_BADASO_MENU` Anda ke `.env`. Jika Anda memiliki menu lain, sertakan menu tersebut menggunakan koma pembatas (,).

```
MIX_BADASO_MENU=admin,commerce-theme
```

5. Isi variabel lain dalam file .env.
    - `MIX_COMMERCE_WEB_ROUTE_PREFIX=commerce` Tetapkan awalan untuk tema.
    - `CRON_EXPIRED_ORDER="*/5 * * * *"` Atur tugas cron untuk memeriksa pesanan yang kedaluwarsa.

## Acknowledgements

- [TailwindCSS](https://tailwindcss.com/)
- [VocaJS](https://vocajs.com/)