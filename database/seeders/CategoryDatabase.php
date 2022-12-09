<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryDatabase extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('category')->insert(
            [
                [
                    'category_name'=>'Novel',
                ],

                [
                    'category_name'=>'Education',
                ],

                [
                    'category_name'=>'Manga',
                ],

                [
                    'category_name'=>'Philosophy',
                ],

                [
                    'category_name'=>'Guide',
                ],

            ]);
    }
}
