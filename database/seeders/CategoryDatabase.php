<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryDatabase extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('categories')->insert(
            [
                [
                    'category_name'=>'Novel',
                    'category_image'=>'https://upload.wikimedia.org/wikipedia/en/e/e0/AspectsOfTheNovel.jpg',
                ],

                [
                    'category_name'=>'Education',
                    'category_image'=> 'https://4.imimg.com/data4/WT/KH/MY-23932603/educational-book-printing-500x500.png',
                ],

                [
                    'category_name'=>'Manga',
                    'category_image'=>'https://cdn.realsport101.com/images/ncavvykf/epicstream/e2cc9e80fcc62767c6d5134135f08b06d286ef14-1080x1644.jpg?rect=0,0,1080,1643&w=328&h=499&auto=format',
                ],

                [
                    'category_name'=>'Philosophy',
                    'category_image'=>'https://www.hoaxanh.vn/image/cache/catalog/062020/philosophy_book-400x600.png',
                ],

                [
                    'category_name'=>'Guide',
                    'category_image'=>'https://img.freepik.com/free-vector/yellow-guide-book-cartoon-style_1308-87103.jpg?w=2000',
                ],

            ]);
    }
}
