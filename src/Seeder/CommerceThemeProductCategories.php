<?php

namespace Database\Seeders\Badaso\Commerce\Theme;

use Exception;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Uasoft\Badaso\Models\Menu;
use Uasoft\Badaso\Models\MenuItem;

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

            DB::table('badaso_product_categories')->insert(array(
                0 =>
                array(

                    'parent_id' => NULL,
                    'name' => 'Electronic',
                    'slug' => 'electronic',
                    'desc' => NULL,
                    'SKU' => NULL,
                    'image' => 'files/shares/electronic.png',
                    'created_at' => '2021-09-13 09:16:50',
                    'updated_at' => '2021-09-13 09:16:50',
                    'deleted_at' => NULL,
                ),
                1 =>
                array(

                    'parent_id' => NULL,
                    'name' => 'Food & Drink',
                    'slug' => 'food-drink',
                    'desc' => NULL,
                    'SKU' => NULL,
                    'image' => 'files/shares/food-drink.png',
                    'created_at' => '2021-09-13 09:17:30',
                    'updated_at' => '2021-09-13 09:17:30',
                    'deleted_at' => NULL,
                ),
                2 =>
                array(

                    'parent_id' => NULL,
                    'name' => 'Computer & Accessories',
                    'slug' => 'computer-accessories',
                    'desc' => NULL,
                    'SKU' => NULL,
                    'image' => 'files/shares/computer-accessories.png',
                    'created_at' => '2021-09-13 09:17:40',
                    'updated_at' => '2021-09-13 09:17:40',
                    'deleted_at' => NULL,
                ),
                3 =>
                array(

                    'parent_id' => NULL,
                    'name' => 'Treatment & Beauty',
                    'slug' => 'treatment-beauty',
                    'desc' => NULL,
                    'SKU' => NULL,
                    'image' => 'files/shares/treatment-beauty.png',
                    'created_at' => '2021-09-13 09:17:54',
                    'updated_at' => '2021-09-13 09:17:54',
                    'deleted_at' => NULL,
                ),
                4 =>
                array(

                    'parent_id' => NULL,
                    'name' => 'Phone & Accessories',
                    'slug' => 'phone-accessories',
                    'desc' => NULL,
                    'SKU' => NULL,
                    'image' => 'files/shares/phone-accessories.png',
                    'created_at' => '2021-09-13 09:18:03',
                    'updated_at' => '2021-09-13 09:18:03',
                    'deleted_at' => NULL,
                ),
                5 =>
                array(

                    'parent_id' => NULL,
                    'name' => 'Home Appliances',
                    'slug' => 'home-appliances',
                    'desc' => NULL,
                    'SKU' => NULL,
                    'image' => 'files/shares/home-appliances.png',
                    'created_at' => '2021-09-13 09:18:10',
                    'updated_at' => '2021-09-13 09:18:10',
                    'deleted_at' => NULL,
                ),
                6 =>
                array(

                    'parent_id' => NULL,
                    'name' => 'Menswear',
                    'slug' => 'menswear',
                    'desc' => NULL,
                    'SKU' => NULL,
                    'image' => 'files/shares/menswear.png',
                    'created_at' => '2021-09-13 09:18:20',
                    'updated_at' => '2021-09-13 09:18:20',
                    'deleted_at' => NULL,
                ),
                7 =>
                array(

                    'parent_id' => NULL,
                    'name' => 'Ladieswear',
                    'slug' => 'ladieswear',
                    'desc' => NULL,
                    'SKU' => NULL,
                    'image' => 'files/shares/ladieswear.png',
                    'created_at' => '2021-09-13 09:18:28',
                    'updated_at' => '2021-09-13 09:18:28',
                    'deleted_at' => NULL,
                ),
                8 =>
                array(

                    'parent_id' => NULL,
                    'name' => "Men's Shoes",
                    'slug' => 'mens-shoes',
                    'desc' => NULL,
                    'SKU' => NULL,
                    'image' => 'files/shares/mens-shoes.png',
                    'created_at' => '2021-09-13 09:18:36',
                    'updated_at' => '2021-09-13 09:18:36',
                    'deleted_at' => NULL,
                ),
                9 =>
                array(

                    'parent_id' => NULL,
                    'name' => 'Muslim Fashion',
                    'slug' => 'muslim-fashion',
                    'desc' => NULL,
                    'SKU' => NULL,
                    'image' => 'files/shares/muslim-fashion.png',
                    'created_at' => '2021-09-13 09:18:48',
                    'updated_at' => '2021-09-13 09:18:48',
                    'deleted_at' => NULL,
                ),
                10 =>
                array(

                    'parent_id' => NULL,
                    'name' => "Men's Bag",
                    'slug' => 'mens-bag',
                    'desc' => NULL,
                    'SKU' => NULL,
                    'image' => 'files/shares/mens-bag.png',
                    'created_at' => '2021-09-13 09:18:58',
                    'updated_at' => '2021-09-13 09:18:58',
                    'deleted_at' => NULL,
                ),
                11 =>
                array(

                    'parent_id' => NULL,
                    'name' => 'Baby & Kids Fashion',
                    'slug' => 'baby-kids-fashion',
                    'desc' => NULL,
                    'SKU' => NULL,
                    'image' => 'files/shares/baby-kids-fashion.png',
                    'created_at' => '2021-09-13 09:19:08',
                    'updated_at' => '2021-09-13 09:19:08',
                    'deleted_at' => NULL,
                ),
                12 =>
                array(

                    'parent_id' => NULL,
                    'name' => 'Fashion Accessories',
                    'slug' => 'fashion-accessories',
                    'desc' => NULL,
                    'SKU' => NULL,
                    'image' => 'files/shares/fashion-accessories.png',
                    'created_at' => '2021-09-13 09:19:19',
                    'updated_at' => '2021-09-13 09:19:19',
                    'deleted_at' => NULL,
                ),
                13 =>
                array(

                    'parent_id' => NULL,
                    'name' => 'Mother & Baby',
                    'slug' => 'mother-baby',
                    'desc' => NULL,
                    'SKU' => NULL,
                    'image' => 'files/shares/mother-baby.png',
                    'created_at' => '2021-09-13 09:19:28',
                    'updated_at' => '2021-09-13 09:19:28',
                    'deleted_at' => NULL,
                ),
                14 =>
                array(

                    'parent_id' => NULL,
                    'name' => 'Wristwatch',
                    'slug' => 'wristwatch',
                    'desc' => NULL,
                    'SKU' => NULL,
                    'image' => 'files/shares/wristwatch.png',
                    'created_at' => '2021-09-13 09:19:36',
                    'updated_at' => '2021-09-13 09:19:36',
                    'deleted_at' => NULL,
                ),
                15 =>
                array(

                    'parent_id' => NULL,
                    'name' => "Women's Shoes",
                    'slug' => 'womens-shoes',
                    'desc' => NULL,
                    'SKU' => NULL,
                    'image' => 'files/shares/womens-shoes.png',
                    'created_at' => '2021-09-13 09:20:07',
                    'updated_at' => '2021-09-13 09:20:07',
                    'deleted_at' => NULL,
                ),
                16 =>
                array(

                    'parent_id' => NULL,
                    'name' => 'Health',
                    'slug' => 'health',
                    'desc' => NULL,
                    'SKU' => NULL,
                    'image' => 'files/shares/health.png',
                    'created_at' => '2021-09-13 09:20:14',
                    'updated_at' => '2021-09-13 09:20:14',
                    'deleted_at' => NULL,
                ),
                17 =>
                array(

                    'parent_id' => NULL,
                    'name' => "Women's Bag",
                    'slug' => 'womens-bag',
                    'desc' => NULL,
                    'SKU' => NULL,
                    'image' => 'files/shares/womens-bag.png',
                    'created_at' => '2021-09-13 09:20:20',
                    'updated_at' => '2021-09-13 09:20:20',
                    'deleted_at' => NULL,
                ),
                18 =>
                array(

                    'parent_id' => NULL,
                    'name' => 'Hobbies & Collections',
                    'slug' => 'hobbies-collections',
                    'desc' => NULL,
                    'SKU' => NULL,
                    'image' => 'files/shares/hobbies-collections.png',
                    'created_at' => '2021-09-13 09:20:41',
                    'updated_at' => '2021-09-13 09:20:41',
                    'deleted_at' => NULL,
                ),
                19 =>
                array(

                    'parent_id' => NULL,
                    'name' => 'Automotive',
                    'slug' => 'automotive',
                    'desc' => NULL,
                    'SKU' => NULL,
                    'image' => 'files/shares/automotive.png',
                    'created_at' => '2021-09-13 09:20:47',
                    'updated_at' => '2021-09-13 09:20:47',
                    'deleted_at' => NULL,
                ),
                20 =>
                array(

                    'parent_id' => NULL,
                    'name' => 'Sports & Outdoor',
                    'slug' => 'sports-outdoor',
                    'desc' => NULL,
                    'SKU' => NULL,
                    'image' => 'files/shares/sports-outdoor.png',
                    'created_at' => '2021-09-13 09:20:56',
                    'updated_at' => '2021-09-13 09:20:56',
                    'deleted_at' => NULL,
                ),
                21 =>
                array(

                    'parent_id' => NULL,
                    'name' => 'Souvenirs & Parties',
                    'slug' => 'souvenirs-parties',
                    'desc' => NULL,
                    'SKU' => NULL,
                    'image' => 'files/shares/souvenirs-parties.png',
                    'created_at' => '2021-09-13 09:21:21',
                    'updated_at' => '2021-09-13 09:21:21',
                    'deleted_at' => NULL,
                ),
                22 =>
                array(

                    'parent_id' => NULL,
                    'name' => 'Books & Stationery',
                    'slug' => 'books-stationery',
                    'desc' => NULL,
                    'SKU' => NULL,
                    'image' => 'files/shares/books-stationery.png',
                    'created_at' => '2021-09-13 09:21:29',
                    'updated_at' => '2021-09-13 09:21:29',
                    'deleted_at' => NULL,
                ),
                23 =>
                array(

                    'parent_id' => NULL,
                    'name' => 'Photograph',
                    'slug' => 'photograph',
                    'desc' => NULL,
                    'SKU' => NULL,
                    'image' => 'files/shares/photograph.png',
                    'created_at' => '2021-09-13 09:21:37',
                    'updated_at' => '2021-09-13 09:21:37',
                    'deleted_at' => NULL,
                ),
                24 =>
                array(

                    'parent_id' => NULL,
                    'name' => 'Voucher',
                    'slug' => 'voucher',
                    'desc' => NULL,
                    'SKU' => NULL,
                    'image' => 'files/shares/voucher.png',
                    'created_at' => '2021-09-13 09:21:42',
                    'updated_at' => '2021-09-13 09:21:42',
                    'deleted_at' => NULL,
                ),
            ));
        } catch (Exception $e) {
            throw new Exception('Exception occur ' . $e);
            DB::rollBack();
        }

        DB::commit();
    }
}
