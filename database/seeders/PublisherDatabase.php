<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PublisherDatabase extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('publishers')->insert(
            [
                [
                    'publisher_name'=>'Penguin Random House',
                    'publisher_image'=>'https://d3.harvard.edu/platform-digit/wp-content/uploads/sites/2/2022/10/penguin-random-house.jpg'
                ],

                [
                    'publisher_name'=>'HarperCollins',
                    'publisher_image'=>'https://www.publishersweekly.com/images/data/ARTICLE_PHOTO/photo/000/025/25401-1.JPG'
                ],

                [
                    'publisher_name'=>'Simon & Schuster',
                    'publisher_image'=>'https://upload.wikimedia.org/wikipedia/en/thumb/d/db/Simon_and_Schuster.svg/1200px-Simon_and_Schuster.svg.png'
                ],

                [
                    'publisher_name'=>'Hachette Book Group',
                    'publisher_image'=>'https://www.hachettebooks.com/wp-content/uploads/2017/06/HB_FeaturedImage_Slider1.png?fit=661%2C480'
                ],

            ]);
    }
}
