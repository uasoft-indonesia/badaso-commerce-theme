<?php

namespace Database\Seeders\Badaso\Commerce\Theme;

use Exception;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommerceThemeProductCategories extends Seeder
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
            DB::table('badaso_product_categories')->delete();

            DB::table('badaso_product_categories')->insert([
                0 => [

                    'parent_id'  => null,
                    'name'       => 'Electronic',
                    'slug'       => 'electronic',
                    'desc'       => null,
                    'SKU'        => null,
                    'image'      => 'files/shares/electronic.png',
                    'created_at' => '2021-09-13 09:16:50',
                    'updated_at' => '2021-09-13 09:16:50',
                    'deleted_at' => null,
                ],
                1 => [

                    'parent_id'  => null,
                    'name'       => 'Food & Drink',
                    'slug'       => 'food-drink',
                    'desc'       => null,
                    'SKU'        => null,
                    'image'      => 'files/shares/food-drink.png',
                    'created_at' => '2021-09-13 09:17:30',
                    'updated_at' => '2021-09-13 09:17:30',
                    'deleted_at' => null,
                ],
                2 => [

                    'parent_id'  => null,
                    'name'       => 'Computer & Accessories',
                    'slug'       => 'computer-accessories',
                    'desc'       => null,
                    'SKU'        => null,
                    'image'      => 'files/shares/computer-accessories.png',
                    'created_at' => '2021-09-13 09:17:40',
                    'updated_at' => '2021-09-13 09:17:40',
                    'deleted_at' => null,
                ],
                3 => [

                    'parent_id'  => null,
                    'name'       => 'Treatment & Beauty',
                    'slug'       => 'treatment-beauty',
                    'desc'       => null,
                    'SKU'        => null,
                    'image'      => 'files/shares/treatment-beauty.png',
                    'created_at' => '2021-09-13 09:17:54',
                    'updated_at' => '2021-09-13 09:17:54',
                    'deleted_at' => null,
                ],
                4 => [

                    'parent_id'  => null,
                    'name'       => 'Phone & Accessories',
                    'slug'       => 'phone-accessories',
                    'desc'       => null,
                    'SKU'        => null,
                    'image'      => 'files/shares/phone-accessories.png',
                    'created_at' => '2021-09-13 09:18:03',
                    'updated_at' => '2021-09-13 09:18:03',
                    'deleted_at' => null,
                ],
                5 => [

                    'parent_id'  => null,
                    'name'       => 'Home Appliances',
                    'slug'       => 'home-appliances',
                    'desc'       => null,
                    'SKU'        => null,
                    'image'      => 'files/shares/home-appliances.png',
                    'created_at' => '2021-09-13 09:18:10',
                    'updated_at' => '2021-09-13 09:18:10',
                    'deleted_at' => null,
                ],
                6 => [

                    'parent_id'  => null,
                    'name'       => 'Menswear',
                    'slug'       => 'menswear',
                    'desc'       => null,
                    'SKU'        => null,
                    'image'      => 'files/shares/menswear.png',
                    'created_at' => '2021-09-13 09:18:20',
                    'updated_at' => '2021-09-13 09:18:20',
                    'deleted_at' => null,
                ],
                7 => [

                    'parent_id'  => null,
                    'name'       => 'Ladieswear',
                    'slug'       => 'ladieswear',
                    'desc'       => null,
                    'SKU'        => null,
                    'image'      => 'files/shares/ladieswear.png',
                    'created_at' => '2021-09-13 09:18:28',
                    'updated_at' => '2021-09-13 09:18:28',
                    'deleted_at' => null,
                ],
                8 => [

                    'parent_id'  => null,
                    'name'       => "Men's Shoes",
                    'slug'       => 'mens-shoes',
                    'desc'       => null,
                    'SKU'        => null,
                    'image'      => 'files/shares/mens-shoes.png',
                    'created_at' => '2021-09-13 09:18:36',
                    'updated_at' => '2021-09-13 09:18:36',
                    'deleted_at' => null,
                ],
                9 => [

                    'parent_id'  => null,
                    'name'       => 'Muslim Fashion',
                    'slug'       => 'muslim-fashion',
                    'desc'       => null,
                    'SKU'        => null,
                    'image'      => 'files/shares/muslim-fashion.png',
                    'created_at' => '2021-09-13 09:18:48',
                    'updated_at' => '2021-09-13 09:18:48',
                    'deleted_at' => null,
                ],
                10 => [

                    'parent_id'  => null,
                    'name'       => "Men's Bag",
                    'slug'       => 'mens-bag',
                    'desc'       => null,
                    'SKU'        => null,
                    'image'      => 'files/shares/mens-bag.png',
                    'created_at' => '2021-09-13 09:18:58',
                    'updated_at' => '2021-09-13 09:18:58',
                    'deleted_at' => null,
                ],
                11 => [

                    'parent_id'  => null,
                    'name'       => 'Baby & Kids Fashion',
                    'slug'       => 'baby-kids-fashion',
                    'desc'       => null,
                    'SKU'        => null,
                    'image'      => 'files/shares/baby-kids-fashion.png',
                    'created_at' => '2021-09-13 09:19:08',
                    'updated_at' => '2021-09-13 09:19:08',
                    'deleted_at' => null,
                ],
                12 => [

                    'parent_id'  => null,
                    'name'       => 'Fashion Accessories',
                    'slug'       => 'fashion-accessories',
                    'desc'       => null,
                    'SKU'        => null,
                    'image'      => 'files/shares/fashion-accessories.png',
                    'created_at' => '2021-09-13 09:19:19',
                    'updated_at' => '2021-09-13 09:19:19',
                    'deleted_at' => null,
                ],
                13 => [

                    'parent_id'  => null,
                    'name'       => 'Mother & Baby',
                    'slug'       => 'mother-baby',
                    'desc'       => null,
                    'SKU'        => null,
                    'image'      => 'files/shares/mother-baby.png',
                    'created_at' => '2021-09-13 09:19:28',
                    'updated_at' => '2021-09-13 09:19:28',
                    'deleted_at' => null,
                ],
                14 => [

                    'parent_id'  => null,
                    'name'       => 'Wristwatch',
                    'slug'       => 'wristwatch',
                    'desc'       => null,
                    'SKU'        => null,
                    'image'      => 'files/shares/wristwatch.png',
                    'created_at' => '2021-09-13 09:19:36',
                    'updated_at' => '2021-09-13 09:19:36',
                    'deleted_at' => null,
                ],
                15 => [

                    'parent_id'  => null,
                    'name'       => "Women's Shoes",
                    'slug'       => 'womens-shoes',
                    'desc'       => null,
                    'SKU'        => null,
                    'image'      => 'files/shares/womens-shoes.png',
                    'created_at' => '2021-09-13 09:20:07',
                    'updated_at' => '2021-09-13 09:20:07',
                    'deleted_at' => null,
                ],
                16 => [

                    'parent_id'  => null,
                    'name'       => 'Health',
                    'slug'       => 'health',
                    'desc'       => null,
                    'SKU'        => null,
                    'image'      => 'files/shares/health.png',
                    'created_at' => '2021-09-13 09:20:14',
                    'updated_at' => '2021-09-13 09:20:14',
                    'deleted_at' => null,
                ],
                17 => [

                    'parent_id'  => null,
                    'name'       => "Women's Bag",
                    'slug'       => 'womens-bag',
                    'desc'       => null,
                    'SKU'        => null,
                    'image'      => 'files/shares/womens-bag.png',
                    'created_at' => '2021-09-13 09:20:20',
                    'updated_at' => '2021-09-13 09:20:20',
                    'deleted_at' => null,
                ],
                18 => [

                    'parent_id'  => null,
                    'name'       => 'Hobbies & Collections',
                    'slug'       => 'hobbies-collections',
                    'desc'       => null,
                    'SKU'        => null,
                    'image'      => 'files/shares/hobbies-collections.png',
                    'created_at' => '2021-09-13 09:20:41',
                    'updated_at' => '2021-09-13 09:20:41',
                    'deleted_at' => null,
                ],
                19 => [

                    'parent_id'  => null,
                    'name'       => 'Automotive',
                    'slug'       => 'automotive',
                    'desc'       => null,
                    'SKU'        => null,
                    'image'      => 'files/shares/automotive.png',
                    'created_at' => '2021-09-13 09:20:47',
                    'updated_at' => '2021-09-13 09:20:47',
                    'deleted_at' => null,
                ],
                20 => [

                    'parent_id'  => null,
                    'name'       => 'Sports & Outdoor',
                    'slug'       => 'sports-outdoor',
                    'desc'       => null,
                    'SKU'        => null,
                    'image'      => 'files/shares/sports-outdoor.png',
                    'created_at' => '2021-09-13 09:20:56',
                    'updated_at' => '2021-09-13 09:20:56',
                    'deleted_at' => null,
                ],
                21 => [

                    'parent_id'  => null,
                    'name'       => 'Souvenirs & Parties',
                    'slug'       => 'souvenirs-parties',
                    'desc'       => null,
                    'SKU'        => null,
                    'image'      => 'files/shares/souvenirs-parties.png',
                    'created_at' => '2021-09-13 09:21:21',
                    'updated_at' => '2021-09-13 09:21:21',
                    'deleted_at' => null,
                ],
                22 => [

                    'parent_id'  => null,
                    'name'       => 'Books & Stationery',
                    'slug'       => 'books-stationery',
                    'desc'       => null,
                    'SKU'        => null,
                    'image'      => 'files/shares/books-stationery.png',
                    'created_at' => '2021-09-13 09:21:29',
                    'updated_at' => '2021-09-13 09:21:29',
                    'deleted_at' => null,
                ],
                23 => [

                    'parent_id'  => null,
                    'name'       => 'Photograph',
                    'slug'       => 'photograph',
                    'desc'       => null,
                    'SKU'        => null,
                    'image'      => 'files/shares/photograph.png',
                    'created_at' => '2021-09-13 09:21:37',
                    'updated_at' => '2021-09-13 09:21:37',
                    'deleted_at' => null,
                ],
                24 => [

                    'parent_id'  => null,
                    'name'       => 'Voucher',
                    'slug'       => 'voucher',
                    'desc'       => null,
                    'SKU'        => null,
                    'image'      => 'files/shares/voucher.png',
                    'created_at' => '2021-09-13 09:21:42',
                    'updated_at' => '2021-09-13 09:21:42',
                    'deleted_at' => null,
                ],
            ]);
        } catch (Exception $e) {
            throw new Exception('Exception occur '.$e);
            DB::rollBack();
        }

        DB::commit();
    }
}
