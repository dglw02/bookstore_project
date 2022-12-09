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
                ],

                [
                    'publisher_name'=>'HarperCollins',
                ],

                [
                    'publisher_name'=>'Simon & Schuster',
                ],

                [
                    'publisher_name'=>'Hachette Book Group',
                ],

            ]);
    }
}
