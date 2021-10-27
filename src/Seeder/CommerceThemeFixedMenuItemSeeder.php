<?php

namespace Database\Seeders\Badaso\Commerce\Theme;

use Exception;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Uasoft\Badaso\Models\Menu;
use Uasoft\Badaso\Models\MenuItem;

class CommerceThemeFixedMenuItemSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @throws Exception
     *
     * @return void
     */
    public function run()
    {
        DB::beginTransaction();

        try {
            $menu_id = Menu::where('key', 'commerce-theme')->first()->id;

            $menu_items = [
                0 => [
                    'menu_id' => $menu_id,
                    'title' => 'Commerce Theme Configuration',
                    'url' => '/commerce-theme-config',
                    'target' => '_self',
                    'icon_class' => 'desktop_mac',
                    'color' => '',
                    'parent_id' => null,
                    'order' => 1,
                    'permissions' => 'browse_theme_commerce_configurations',
                ]
            ];

            $new_menu_items = [];
            foreach ($menu_items as $key => $value) {
                $menu_item = MenuItem::where('menu_id', $value['menu_id'])
                        ->where('url', $value['url'])
                        ->first();

                if (isset($menu_item)) {
                    continue;
                }

                MenuItem::create($value);
            }
        } catch (Exception $e) {
            throw new Exception('Exception occur '.$e);
            DB::rollBack();
        }

        DB::commit();
    }
}
