<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'category' => '服'
        ];
        DB::table('categories')->insert($param);

        $param = [
            'category' => '靴'
        ];
        DB::table('categories')->insert($param);

        $param = [
            'category' => '小物'
        ];
        DB::table('categories')->insert($param);

        $param = [
            'category' => 'バック'
        ];
        DB::table('categories')->insert($param);

        $param = [
            'category' => '装飾品'
        ];
        DB::table('categories')->insert($param);

        $param = [
            'category' => 'その他'
        ];
        DB::table('categories')->insert($param);
    }
}
