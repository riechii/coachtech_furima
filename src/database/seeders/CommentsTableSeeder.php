<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentsTableSeeder extends Seeder
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
            'item_id' => 1,
            'comment' => 'コメントテストです。',
        ];
        DB::table('comments')->insert($param);

        $param = [
            'user_id' => 2,
            'item_id' => 1,
            'comment' => 'コメントテスト2です。',
        ];
        DB::table('comments')->insert($param);

        $param = [
            'user_id' => 3,
            'item_id' => 2,
            'comment' => 'コメントテスト3です。',
        ];
        DB::table('comments')->insert($param);

        $param = [
            'user_id' => 1,
            'item_id' => 2,
            'comment' => 'コメントテスト4です。',
        ];
        DB::table('comments')->insert($param);

        $param = [
            'user_id' => 3,
            'item_id' => 1,
            'comment' => 'コメントテスト5です。',
        ];
        DB::table('comments')->insert($param);
    }
}
