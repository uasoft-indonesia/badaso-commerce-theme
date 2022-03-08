<?php

namespace Database\Seeders\Badaso\Commerce\Theme;

use Exception;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Uasoft\Badaso\Module\Content\Models\Content;

class CommerceThemeContentSeeder extends Seeder
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
            Content::create([
                'slug'  => 'home-banner',
                'label' => 'Home Banner',
                'value' => '{"mainBanner":{"name":"mainBanner","label":"Main Banner","type":"group","data":{"banner1":{"name":"banner1","label":"Banner 1","type":"image","data":"https:\/\/picsum.photos\/900\/270"},"banner2":{"name":"banner2","label":"Banner 2","type":"image","data":"https:\/\/picsum.photos\/900\/270"}}},"subBanner":{"name":"subBanner","label":"Sub Banner","type":"group","data":{"subBanner1":{"name":"subBanner1","label":"Sub Banner 1","type":"image","data":"https:\/\/picsum.photos\/600\/180"},"subBanner2":{"name":"subBanner2","label":"Sub Banner 2","type":"image","data":"https:\/\/picsum.photos\/600\/180"}}}}',
            ]);

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();

            throw new Exception('Exception occur '.$e);
        }
    }
}
