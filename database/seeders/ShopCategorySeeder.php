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
                'category_group' => 1,
            ],
            [
                'name' => 'ストリート',
                'category_group' => 2,
            ],
            [
                'name' => 'ヴィンテージ',
                'category_group' => 3,
            ],
            [
                'name' => 'ヨーロッパ系',
                'category_group' => 4,
            ],
            [
                'name' => 'ブランド',
                'category_group' => 5,
            ],
            [
                'name' => 'アクセサリー',
                'category_group' => 6,
            ],
        ]);
    }
}
