<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CityDatabase extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert(
            [
                //North
                [
                    'city_name'=>'Ha Noi',
                    'areas_id'=>1
                ],

                [
                    'city_name'=>'Bac Giang',
                    'areas_id'=>1
                ],

                [
                    'city_name'=>'Viet Tri',
                    'areas_id'=>1
                ],

                [
                    'city_name'=>'Lang Son',
                    'areas_id'=>1
                ],

                [
                    'city_name'=>'Thai Nguyen',
                    'areas_id'=>1
                ],

                [
                    'city_name'=>'Hoa Binh',
                    'areas_id'=>1
                ],

                [
                    'city_name'=>'Ha Giang',
                    'areas_id'=>1
                ],

                [
                    'city_name'=>'Ha Long',
                    'areas_id'=>1
                ],

                [
                    'city_name'=>'Cao Bang',
                    'areas_id'=>1
                ],

                [
                    'city_name'=>'Yen Bai',
                    'areas_id'=>1
                ],

                [
                    'city_name'=>'Vinh Yen',
                    'areas_id'=>1
                ],

                [
                    'city_name'=>'Hai Phong',
                    'areas_id'=>1
                ],

                [
                    'city_name'=>'Hai Duong',
                    'areas_id'=>1
                ],

                [
                    'city_name'=>'Thai Binh',
                    'areas_id'=>1
                ],

                //Center

                [
                    'city_name'=>'Da Nang',
                    'areas_id'=>2
                ],

                [
                    'city_name'=>'Hue',
                    'areas_id'=>2
                ],

                [
                    'city_name'=>'Nha Trang',
                    'areas_id'=>2
                ],

                [
                    'city_name'=>'Quy Nhon',
                    'areas_id'=>2
                ],

                [
                    'city_name'=>'Hoi An',
                    'areas_id'=>2
                ],

                [
                    'city_name'=>'Quang Ngai',
                    'areas_id'=>2
                ],

                [
                    'city_name'=>'Tuy Hoa',
                    'areas_id'=>2
                ],

                [
                    'city_name'=>'Thanh Hoa',
                    'areas_id'=>2
                ],

                [
                    'city_name'=>'Buon Ma Thuot',
                    'areas_id'=>2
                ],

                [
                    'city_name'=>'Da Lat',
                    'areas_id'=>2
                ],

                [
                    'city_name'=>'Dong Hoi',
                    'areas_id'=>2
                ],

                [
                    'city_name'=>'Ha Tinh',
                    'areas_id'=>2
                ],

                [
                    'city_name'=>'Kon Tum',
                    'areas_id'=>2
                ],

                [
                    'city_name'=>'Dong Ha',
                    'areas_id'=>2
                ],

                //South
                [
                    'city_name'=>'TP.HCM',
                    'areas_id'=>3
                ],

                [
                    'city_name'=>'Can Tho',
                    'areas_id'=>3
                ],

                [
                    'city_name'=>'Vung Tau',
                    'areas_id'=>3
                ],

                [
                    'city_name'=>'My Tho',
                    'areas_id'=>3
                ],

                [
                    'city_name'=>'Bien Hoa',
                    'areas_id'=>3
                ],

                [
                    'city_name'=>'Ca Mau',
                    'areas_id'=>3
                ],

                [
                    'city_name'=>'Loc Xuyen',
                    'areas_id'=>3
                ],

                [
                    'city_name'=>'Cao Lanh',
                    'areas_id'=>3
                ],

                [
                    'city_name'=>'Tra Vinh',
                    'areas_id'=>3
                ],


            ]);
    }
}
