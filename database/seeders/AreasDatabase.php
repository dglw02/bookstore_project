<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AreasDatabase extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        DB::table('areas')->insert(
            [
            [
                'areas_name'=>'Area North',
                'areas_price'=>0
            ],

            [
                'areas_name'=>'Area Center',
                'areas_price'=>10000
            ],

            [
                'areas_name'=>'Area South',
                'areas_price'=>20000
            ]

        ]);
    }
}
