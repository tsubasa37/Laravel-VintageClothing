<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShopCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('shop_categories')->insert([
            [
                'name' => 'アメリカ系',
                'created_at' => '2023/6/19 11:11:11'
            ],
            [
                'name' => 'ストリート',
                'created_at' => '2023/6/19 11:11:11'
            ],
            [
                'name' => 'ヴィンテージ',
                'created_at' => '2023/6/19 11:11:11'
            ],
            [
                'name' => 'ヨーロッパ系',
                'created_at' => '2023/6/19 11:11:11'
            ],
            [
                'name' => 'ブランド',
                'created_at' => '2023/6/19 11:11:11'
            ],
            [
                'name' => 'アクセサリー',
                'created_at' => '2023/6/19 11:11:11'
            ],
        ]);
    }
}
