<?php

namespace Database\Seeders\Badaso\Commerce\Theme;

use Illuminate\Database\Seeder;
use Uasoft\Badaso\Models\Configuration;

class CommerceThemeSiteManagementSeeder extends Seeder
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
        \DB::beginTransaction();

        try {
            $settings = [
                // 0 => [
                //     'key' => 'commerceHasExpiredOrder',
                //     'display_name' => 'Has Expired Order',
                //     'value' => 1,
                //     'details' => '{}',
                //     'type' => 'switch',
                //     'order' => 1,
                //     'group' => 'commercePanel',
                //     'can_delete' => 0,
                // ],
            ];

            foreach ($settings as $key => $value) {
                Configuration::where('key', $value['key'])->delete();
                Configuration::create($value);
            }
            \DB::commit();
        } catch (Exception $e) {
            throw new Exception('Exception occur '.$e);
            \DB::rollBack();
        }
    }
}
