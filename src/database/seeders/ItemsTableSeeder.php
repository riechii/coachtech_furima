<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'user_id' => 1,
            'category_id' => 1,
            'image' => 'storage/images/20240323_2343_sweater.jpg',
            'situation' => '良',
            'product_name' => 'セーター',
            'explanation' => 'テスト：セーターです。',
            'price' => 1000,
        ];
        DB::table('items')->insert($param);

        $param = [
            'user_id' => 1,
            'category_id' => 4,
            'image' => 'storage/images/20240323_2313_bag.jpg',
            'situation' => '良',
            'product_name' => 'トートバック',
            'explanation' => 'テスト：トートバックです。',
            'price' => 100,
        ];
        DB::table('items')->insert($param);

        $param = [
            'user_id' => 2,
            'category_id' => 2,
            'image' => 'storage/images/20240323_2314_hightheel.jpg',
            'situation' => '傷あり',
            'product_name' => 'ハイヒール',
            'explanation' => 'テスト：ハイヒールです。',
            'price' => 10000,
        ];
        DB::table('items')->insert($param);

        $param = [
            'user_id' => 2,
            'category_id' => 2,
            'image' => 'storage/images/20240323_2342_shoes,jpg.jpg',
            'situation' => '良',
            'product_name' => 'スニーカー',
            'explanation' => 'テスト：スニーカーです。',
            'price' => 2000,
        ];
        DB::table('items')->insert($param);

        $param = [
            'user_id' => 3,
            'category_id' => 3,
            'image' => 'storage/images/20240323_2344_tie.jpg',
            'situation' => '新品',
            'product_name' => 'ネクタイ',
            'explanation' => 'テスト：ネクタイです。',
            'price' => 500,
        ];
        DB::table('items')->insert($param);
    }
}
