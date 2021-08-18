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
        $this->call(CommerceThemeMenusSeeder::class);
        $this->call(CommerceThemeFixedMenuItemSeeder::class);
        $this->call(CommerceThemeSiteManagementSeeder::class);
    }
}
