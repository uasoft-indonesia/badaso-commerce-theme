<?php

namespace Database\Seeders\Badaso\Commerce\Theme;

use Exception;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Uasoft\Badaso\Models\Menu;

class CommerceThemeMenusSeeder extends Seeder
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
            $menus = [
                0 => [
                    'key' => 'commerce-theme',
                    'display_name' => 'Commerce Theme Menu',
                ],
            ];

            $new_menus = [];
            foreach ($menus as $key => $value) {
                $menu = Menu::where('key', $value['key'])
                        ->first();

                if (isset($menu)) {
                    continue;
                }

                Menu::create($value);
            }
        } catch (Exception $e) {
            throw new Exception('Exception occur '.$e);
            DB::rollBack();
        }

        DB::commit();
    }
}
