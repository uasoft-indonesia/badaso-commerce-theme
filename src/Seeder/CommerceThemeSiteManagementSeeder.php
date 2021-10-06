<?php

namespace Database\Seeders\Badaso\Commerce\Theme;

use Exception;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        DB::beginTransaction();

        try {
            $settings = [
                0 => [
                    'key' => 'logoTextTheme',
                    'display_name' => 'Logo Text Theme',
                    'value' => '',
                    'details' => null,
                    'type' => 'upload_image',
                    'order' => 1,
                    'group' => 'commerceThemePanel',
                    'can_delete' => 0,
                ],
                1 => [
                    'key' => 'themeTitle',
                    'display_name' => 'Theme Title',
                    'value' => 'Badaso Commerce',
                    'details' => null,
                    'type' => 'text',
                    'order' => 2,
                    'group' => 'commerceThemePanel',
                    'can_delete' => 0,
                ],
                2 => [
                    'key' => 'themeSubtitle',
                    'display_name' => 'Theme Subtitle',
                    'value' => 'Theme for Badaso Commerce Module',
                    'details' => null,
                    'type' => 'text',
                    'order' => 3,
                    'group' => 'commerceThemePanel',
                    'can_delete' => 0,
                ],
                3 => [
                    'key' => 'logoTheme',
                    'display_name' => 'Logo Theme',
                    'value' => '',
                    'details' => null,
                    'type' => 'upload_image',
                    'order' => 4,
                    'group' => 'commerceThemePanel',
                    'can_delete' => 0,
                ],
                4 => [
                    'key' => 'transactionUniqueCode',
                    'display_name' => 'Transaction Unique Code',
                    'value' => 3,
                    'details' => null,
                    'type' => 'number',
                    'order' => 5,
                    'group' => 'commerceThemePanel',
                    'can_delete' => 0,
                ],
                5 => [
                    'key' => 'sampleProofOfTransaction',
                    'display_name' => 'Sample Proof of Transaction',
                    'value' => '',
                    'details' => null,
                    'type' => 'upload_image',
                    'order' => 6,
                    'group' => 'commerceThemePanel',
                    'can_delete' => 0,
                ],
                6 => [
                    'key' => 'appName',
                    'display_name' => 'App Name',
                    'value' => 'Commerce Theme',
                    'details' => null,
                    'type' => 'text',
                    'order' => 7,
                    'group' => 'commerceThemePanel',
                    'can_delete' => 0,
                ],
                7 => [
                    'key' => 'tos',
                    'display_name' => 'Term of Service',
                    'value' => '',
                    'details' => null,
                    'type' => 'editor',
                    'order' => 8,
                    'group' => 'commerceThemePanel',
                    'can_delete' => 0,
                ],
                8 => [
                    'key' => 'commerceThemeFavicon',
                    'display_name' => 'Commerce Theme Favicon',
                    'value' => '',
                    'details' => null,
                    'type' => 'upload_image',
                    'order' => 9,
                    'group' => 'commerceThemePanel',
                    'can_delete' => 0,
                ],
            ];

            foreach ($settings as $key => $value) {
                Configuration::where('key', $value['key'])->delete();
                Configuration::create($value);
            }
            DB::commit();
        } catch (Exception $e) {
            throw new Exception('Exception occur '.$e);
            DB::rollBack();
        }
    }
}
