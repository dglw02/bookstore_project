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


        DB::table('area')->insert(
            [
            [
                'area_name'=>'Area North',
                'area_price'=>0
            ],

            [
                'area_name'=>'Area Center',
                'area_price'=>10000
            ],

            [
                'area_name'=>'Area South',
                'area_price'=>20000
            ]

        ]);
    }
}
