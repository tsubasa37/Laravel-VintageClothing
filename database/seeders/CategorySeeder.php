<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('primary_categories')->insert([
            [
                'name' => 'アメリカ系',
                'sort_order' => 1,
            ],
            [
                'name' => 'ストリート',
                'sort_order' => 2,
            ],
            [
                'name' => 'ヴィンテージ',
                'sort_order' => 3,
            ],
            [
                'name' => 'ヨーロッパ系',
                'sort_order' => 4,
            ],
            [
                'name' => 'ブランド',
                'sort_order' => 5,
            ],
        ]);

        DB::table('secondary_categories')->insert([
            [
                'name' => 'アウター',
                'sort_order' => 1,
                'primary_category_id' =>1
            ],
            [
                'name' => 'トップス',
                'sort_order' => 2,
                'primary_category_id' =>1
            ],
            [
                'name' => 'パンツ',
                'sort_order' => 3,
                'primary_category_id' =>1
            ],
            [
                'name' => 'シューズ',
                'sort_order' => 4,
                'primary_category_id' =>1
            ],
            [
                'name' => 'パック',
                'sort_order' => 5,
                'primary_category_id' =>1
            ],
            [
                'name' => 'アクセサリー',
                'sort_order' => 6,
                'primary_category_id' =>1
            ],

            [
                'name' => 'アウター',
                'sort_order' => 7,
                'primary_category_id' =>2
            ],
            [
                'name' => 'トップス',
                'sort_order' => 8,
                'primary_category_id' =>2
            ],
            [
                'name' => 'パンツ',
                'sort_order' => 9,
                'primary_category_id' =>2
            ],
            [
                'name' => 'シューズ',
                'sort_order' => 10,
                'primary_category_id' =>2
            ],
            [
                'name' => 'パック',
                'sort_order' => 11,
                'primary_category_id' =>2
            ],
            [
                'name' => 'アクセサリー',
                'sort_order' => 12,
                'primary_category_id' =>2
            ],

            [
                'name' => 'アウター',
                'sort_order' => 13,
                'primary_category_id' =>3
            ],
            [
                'name' => 'トップス',
                'sort_order' => 14,
                'primary_category_id' =>3
            ],
            [
                'name' => 'パンツ',
                'sort_order' => 15,
                'primary_category_id' =>3
            ],
            [
                'name' => 'シューズ',
                'sort_order' => 16,
                'primary_category_id' =>3
            ],
            [
                'name' => 'パック',
                'sort_order' => 17,
                'primary_category_id' =>3
            ],
            [
                'name' => 'アクセサリー',
                'sort_order' => 18,
                'primary_category_id' =>3
            ],

            [
                'name' => 'アウター',
                'sort_order' => 19,
                'primary_category_id' =>4
            ],
            [
                'name' => 'トップス',
                'sort_order' => 20,
                'primary_category_id' =>4
            ],
            [
                'name' => 'パンツ',
                'sort_order' => 21,
                'primary_category_id' =>4
            ],
            [
                'name' => 'シューズ',
                'sort_order' => 22,
                'primary_category_id' =>4
            ],
            [
                'name' => 'パック',
                'sort_order' => 23,
                'primary_category_id' =>4
            ],
            [
                'name' => 'アクセサリー',
                'sort_order' => 24,
                'primary_category_id' =>4
            ],

            [
                'name' => 'アウター',
                'sort_order' =>25,
                'primary_category_id' =>5
            ],
            [
                'name' => 'トップス',
                'sort_order' => 26,
                'primary_category_id' =>5
            ],
            [
                'name' => 'パンツ',
                'sort_order' => 27,
                'primary_category_id' =>5
            ],
            [
                'name' => 'シューズ',
                'sort_order' => 28,
                'primary_category_id' =>5
            ],
            [
                'name' => 'パック',
                'sort_order' => 29,
                'primary_category_id' =>5
            ],
            [
                'name' => 'アクセサリー',
                'sort_order' => 30,
                'primary_category_id' =>5
            ],
        ]);
    }
}
