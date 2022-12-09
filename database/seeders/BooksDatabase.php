<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BooksDatabase extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('books')->insert(
            [
                [
                    'books_name'=>'Harry Potter',
                    'category_id',
                    'publisher_id',
                    'books_description',
                    'books_author',
                    'books_quantity',
                    'books_image',
                    'books_price',
                    'books_ISBN',
                ],
            ]);
    }
}
