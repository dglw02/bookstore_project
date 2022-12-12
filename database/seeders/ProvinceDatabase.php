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
                //North
                [
                    'province_name'=>'Ha Noi',
                    'areas_id'=>1
                ],

                [
                    'province_name'=>'Bac Giang',
                    'areas_id'=>1
                ],

                [
                    'province_name'=>'Viet Tri',
                    'areas_id'=>1
                ],

                [
                    'province_name'=>'Lang Son',
                    'areas_id'=>1
                ],

                [
                    'province_name'=>'Thai Nguyen',
                    'areas_id'=>1
                ],

                [
                    'province_name'=>'Hoa Binh',
                    'areas_id'=>1
                ],

                [
                    'province_name'=>'Ha Giang',
                    'areas_id'=>1
                ],

                [
                    'province_name'=>'Ha Long',
                    'areas_id'=>1
                ],

                [
                    'province_name'=>'Cao Bang',
                    'areas_id'=>1
                ],

                [
                    'province_name'=>'Yen Bai',
                    'areas_id'=>1
                ],

                [
                    'province_name'=>'Vinh Yen',
                    'areas_id'=>1
                ],

                [
                    'province_name'=>'Hai Phong',
                    'areas_id'=>1
                ],

                [
                    'province_name'=>'Hai Duong',
                    'areas_id'=>1
                ],

                [
                    'province_name'=>'Thai Binh',
                    'areas_id'=>1
                ],

                //Center

                [
                    'province_name'=>'Da Nang',
                    'areas_id'=>2
                ],

                [
                    'province_name'=>'Hue',
                    'areas_id'=>2
                ],

                [
                    'province_name'=>'Nha Trang',
                    'areas_id'=>2
                ],

                [
                    'province_name'=>'Quy Nhon',
                    'areas_id'=>2
                ],

                [
                    'province_name'=>'Hoi An',
                    'areas_id'=>2
                ],

                [
                    'province_name'=>'Quang Ngai',
                    'areas_id'=>2
                ],

                [
                    'province_name'=>'Tuy Hoa',
                    'areas_id'=>2
                ],

                [
                    'province_name'=>'Thanh Hoa',
                    'areas_id'=>2
                ],

                [
                    'province_name'=>'Buon Ma Thuot',
                    'areas_id'=>2
                ],

                [
                    'province_name'=>'Da Lat',
                    'areas_id'=>2
                ],

                [
                    'province_name'=>'Dong Hoi',
                    'areas_id'=>2
                ],

                [
                    'province_name'=>'Ha Tinh',
                    'areas_id'=>2
                ],

                [
                    'province_name'=>'Kon Tum',
                    'areas_id'=>2
                ],

                [
                    'province_name'=>'Dong Ha',
                    'areas_id'=>2
                ],

                //South
                [
                    'province_name'=>'TP.HCM',
                    'areas_id'=>3
                ],

                [
                    'province_name'=>'Can Tho',
                    'areas_id'=>3
                ],

                [
                    'province_name'=>'Vung Tau',
                    'areas_id'=>3
                ],

                [
                    'province_name'=>'My Tho',
                    'areas_id'=>3
                ],

                [
                    'province_name'=>'Bien Hoa',
                    'areas_id'=>3
                ],

                [
                    'province_name'=>'Ca Mau',
                    'areas_id'=>3
                ],

                [
                    'province_name'=>'Loc Xuyen',
                    'areas_id'=>3
                ],

                [
                    'province_name'=>'Cao Lanh',
                    'areas_id'=>3
                ],

                [
                    'province_name'=>'Tra Vinh',
                    'areas_id'=>3
                ],


            ]);
    }
}
