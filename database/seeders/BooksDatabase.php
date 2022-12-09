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
                    'category_id'=>'1',
                    'publisher_id'=>'1',
                    'books_description'=>'Harry Potter is a series of seven fantasy novels written by British author J. K. Rowling. The novels chronicle the lives of a young wizard, Harry Potter, and his friends Hermione Granger and Ron Weasley, all of whom are students at Hogwarts School of Witchcraft and Wizardry',
                    'books_author'=>'1',
                    'books_quantity'=>'30',
                    'books_image'=>'http://prodimage.images-bn.com/pimages/9780545139700_p0_v5_s1200x630.jpg',
                    'books_price'=>'30',
                    'books_ISBN'=>'1234567890',
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
