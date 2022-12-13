<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorDatabase extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('authors')->insert(
            [
                [
                    'author_name'=>'Stephen King',
                    'author_image'=>'https://flxt.tmsimg.com/assets/926_v9_bc.jpg',
                    'author_description'=>'Stephen Edwin King (born September 21, 1947) is an American author of horror, supernatural fiction, suspense, crime, science-fiction, and fantasy novels. Described as the "King of Horror", a play on his surname and a reference to his high standing in pop culture,[2] his books have sold more than 350 million copies,[3] and many have been adapted into films, television series, miniseries, and comic books',
                ],

                [
                    'author_name'=>'William Shakespeare',
                    'author_image'=>'https://upload.wikimedia.org/wikipedia/commons/thumb/3/3c/CHANDOS3.jpg/250px-CHANDOS3.jpg',
                    'author_description'=>'William Shakespeare was an English playwright, poet and actor. He is widely regarded as the greatest writer in the English language and the worlds pre-eminent dramatist. He is often called Englands national poet and the "Bard of Avon"',

                ],

                [
                    'author_name'=>'Mark Twain',
                    'author_image'=>'https://upload.wikimedia.org/wikipedia/commons/thumb/0/0c/Mark_Twain_by_AF_Bradley.jpg/640px-Mark_Twain_by_AF_Bradley.jpg',
                    'author_description'=>'Samuel Langhorne Clemens, known by his pen name Mark Twain, was an American writer, humorist, entrepreneur, publisher, and lecturer. He was praised as the "greatest humorist the United States has produced", and William Faulkner called him "the father of American literature"',
                ],

                [
                    'author_name'=>'F. Scott Fitzgerald',
                    'author_image'=>'https://assets.americanliterature.com/al/images/author/f-scott-fitzgerald.jpg',
                    'author_description'=>'Francis Scott Key Fitzgerald was an American novelist, essayist, and short story writer. He is best known for his novels depicting the flamboyance and excess of the Jazz Age—a term he popularized. During his lifetime, he published four novels, four story collections, and 164 short stories',
                ],
            ]);
    }
}
