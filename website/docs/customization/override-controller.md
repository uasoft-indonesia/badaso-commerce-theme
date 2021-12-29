---
sidebar_position: 1
---

# Override Controller

To override the controller, you can follow the following steps:

- Create a new controller by using below command.

`php artisan make:controller ExampleController`

- After the new controller is created, you can override the controller by registering the controller in the `config/badaso-commerce-theme.php` file in `controllers` section. For example:

```php
return [
    ...,

    'controllers' => [
        'ExampleController' => 'App\Http\Controllers\ExampleController',
    ],
];
```

- You can see the available keys of overrides in the `vendor/badaso/commerce-theme/src/Routes/api.php` file.

Note: All controllers in the Commerce Theme are invoke controllers.