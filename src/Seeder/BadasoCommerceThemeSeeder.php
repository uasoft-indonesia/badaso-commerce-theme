<?php

namespace Database\Seeders\Badaso\Commerce\Theme;

use Illuminate\Database\Seeder;

class BadasoCommerceThemeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CommerceThemeMenusSeeder::class,
            CommerceThemeFixedMenuItemSeeder::class,
            CommerceThemePermissionsSeeder::class,
            CommerceThemeProductCategories::class,
            CommerceThemeSiteManagementSeeder::class,
            CommerceThemeContentSeeder::class
        ]);
    }
}
