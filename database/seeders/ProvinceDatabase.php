<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvinceDatabase extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('provinces')->insert(
            [
                [
                    'province_name'=>'Ha Noi',
                    'areas_id'=>1
                ],

                [
                    'province_name'=>'TP.HCM',
                    'areas_id'=>3
                ]

            ]);
    }
}
