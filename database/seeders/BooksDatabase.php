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
                /*Stephen King*/
                [
                    'books_name'=>'The Blue Lotus',
                    'category_id'=>'1',
                    'publisher_id'=>'1',
                    'books_description'=>'Surviving several attempts on his life by mysterious assailants, Tintin attempts to leave for India by boat, but is kidnapped and brought back to China. His abductors reveal themselves as members of a secret society known as the Sons of the Dragon, who, like the Maharaja, are devoted to combating the opium trade.',
                    'books_author'=>'1',
                    'books_quantity'=>'40',
                    'books_image'=>'https://upload.wikimedia.org/wikipedia/en/5/57/The_Adventures_of_Tintin_-_05_-_The_Blue_Lotus.jpg',
                    'books_price'=>'40',
                    'books_ISBN'=>'6272347247',
                ],

                [
                    'books_name'=>'Lord of the Ring',
                    'category_id'=>'2',
                    'publisher_id'=>'2',
                    'books_description'=>'The Lord of the Rings is an epic high-fantasy novel by English author and scholar J. R. R. Tolkien. Set in Middle-earth, intended to be Earth at some time in the distant past, the story began as a sequel to Tolkiens 1937 childrens book The Hobbit, but eventually developed into a much larger work.',
                    'books_author'=>'2',
                    'books_quantity'=>'40',
                    'books_image'=>'https://m.media-amazon.com/images/I/51OwMSETOJL.jpg',
                    'books_price'=>'35',
                    'books_ISBN'=>'0987654321',
                ],

                [
                    'books_name'=>'The Hunger Games',
                    'category_id'=>'3',
                    'publisher_id'=>'3',
                    'books_description'=>'The Hunger Games is a series of young adult dystopian novels written by American author Suzanne Collins. The first three novels are part of a trilogy following teenage protagonist Katniss Everdeen, and the fourth book is a prequel set 64 years before the original.',
                    'books_author'=>'3',
                    'books_quantity'=>'20',
                    'books_image'=>'https://cdn.shoplightspeed.com/shops/611345/files/5304791/the-hunger-games-03-mockingjay.jpg',
                    'books_price'=>'20',
                    'books_ISBN'=>'2143658709',
                ],


            ]);
    }
}
