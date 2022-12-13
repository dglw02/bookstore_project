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
                    'publisher_image'=>'https://locusmag.com/wp-content/uploads/2018/05/penguin-books.png',
                ],

                [
                    'publisher_name'=>'HarperCollins',
                    'publisher_image'=>'https://res.cloudinary.com/crunchbase-production/image/upload/c_lpad,f_auto,q_auto:eco,dpr_1/rxzdnwsn8vmjrm5tzc4e',
                ],

                [
                    'publisher_name'=>'Simon & Schuster',
                    'publisher_image'=>'https://www.gasscompany.com/web/wp-content/uploads/2015/02/simon-schuster-logo-300x300.jpg',
                ],

                [
                    'publisher_name'=>'Hachette Book Group',
                    'publisher_image'=>'https://pbs.twimg.com/profile_images/1179864624302317569/-V8mcmAH_400x400.jpg',
                ],

            ]);
    }
}
