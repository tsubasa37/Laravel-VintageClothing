<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('shops')->insert([
            [
                'owner_id' => 1,
                'name' => 'お店の名前が入ります。',
                'information' => 'ここにお店の情報が入ります。ここにお店の情報が入ります。ここにお店の情報が入ります。',
                'image1' => '',
                'image2' => '',
                'image3' => '',
                'phone' => '080000000',
                'prefecture' => '',
                'City' => '',
                'address' => '',
                'businessHours' => '',
                'station' => '',
                'regularHoliday' => '',
                'home_page' => '',
                'twitter' => '',
                'Instagram' => '',
                'Facebook' => '',
                'is_selling' => true
            ],
            [
                'owner_id' => 2,
                'name' => 'お店の名前が入ります。',
                'information' => 'ここにお店の情報が入ります。ここにお店の情報が入ります。ここにお店の情報が入ります。',
                'image1' => '',
                'image2' => '',
                'image3' => '',
                'phone' => '080000000',
                'prefecture' => '',
                'City' => '',
                'address' => '',
                'businessHours' => '',
                'station' => '',
                'regularHoliday' => '',
                'home_page' => '',
                'twitter' => '',
                'Instagram' => '',
                'Facebook' => '',
                'is_selling' => true
            ],

        ]);
    }
}
