<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ThreadsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('threads')->insert([
        [
            'user_id' => 1,
            'title' => 'hoge',
            'content' => 'test',
            'created_at' => '2023/6/19 11:11:11'
          ],
          [
            'user_id' => 1,
            'title' => 'hoge',
            'content' => 'test2',
            'created_at' => '2023/6/19 11:11:11'
          ],
          [
            'user_id' => 1,
            'title' => 'hoge',
            'content' => 'test3',
            'created_at' => '2023/6/19 11:11:11'
          ]
        ]);
    }
}
