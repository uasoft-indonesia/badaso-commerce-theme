<?php

use Illuminate\Support\Facades\Route;

$commerce_route_prefix = config('badaso-commerce-theme.theme_prefix');
$admin_panel_route_prefix = \config('badaso.admin_panel_route_prefix');
$api_route_prefix = \config('badaso.api_route_prefix');

Route::get('/' . $commerce_route_prefix . '/{any?}', function () {
  return view('commerce-theme::index');
})->where('any', '^((?!' . $api_route_prefix . '|' . $admin_panel_route_prefix . ').)*');
