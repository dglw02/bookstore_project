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
                /* non+fiction authors*/
                [
                    'author_name'=>'Unknown',
                    'author_description'=>'Unknown',
                    'author_image'=>'https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460__480.png'
                ],

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

                [
                    'author_name'=>'Leo Tolstoy',
                    'author_description'=>'Count Lev Nikolayevich Tolstoy, usually referred to in English as Leo Tolstoy, was a Russian writer who is regarded as one of the greatest authors of all time.',
                    'author_image'=>'https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcRkRdfRvcojBnbsUcySv-9eQd93wIVPdkrSBrcV-Pp-mdwuyl9A'
                ],

                [
                    'author_name'=>'Joyce Carol Oates',
                    'author_description'=>'Joyce Carol Oates is an American writer. Oates published her first book in 1963, and has since published 58 novels, a number of plays and novellas, and many volumes of short stories, poetry, and non-fiction.',
                    'author_image'=>'https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcSKkYc259XZ7xaVjNmXZ9vohC8Hwb4mxfNFoD_bLz52c95iubhQ'
                ],

                [
                    'author_name'=>'James Joyce',
                    'author_description'=>'James Augustine Aloysius Joyce was an Irish novelist, poet, and literary critic. He contributed to the modernist avant-garde movement and is regarded as one of the most influential and important writers of the 20th century.',
                    'author_image'=>'http://t0.gstatic.com/licensed-image?q=tbn:ANd9GcT4roDIaMQEKV0VKIrRBHc2SwriW7REoHpk5MDz8cbxjIVGgCVH9jYokgHUrAjuJpL_'
                ],

                /*manga authors*/
                [
                    'author_name'=>'Eiichiro Oda',
                    'author_description'=>'Eiichiro Oda is a Japanese manga artist and the creator of the series One Piece. With more than 516.5 million tankōbon copies in circulation worldwide, One Piece is both the best-selling manga in history and the best-selling comic series printed in volume, in turn making Oda one of the best-selling fiction authors.',
                    'author_image'=>'https://thenewsfetcher.com/wp-content/uploads/2020/09/Eiichiro-oda.jpg'
                ],

                [
                    'author_name'=>'Osamu Tezuka',
                    'author_description'=>'Osamu Tezuka was a Japanese manga artist, cartoonist, and animator. Born in Osaka Prefecture, his prolific output, pioneering techniques, and innovative redefinitions of genres earned him such titles as "the Father of Manga", "the Godfather of Manga" and "the God of Manga".',
                    'author_image'=>'https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcS30JvH4O5mQnokpnZK63UCcvHiPs3ld5rtp9R_jzhvBMl99knE'
                ],

                [
                    'author_name'=>'Akira Toriyama',
                    'author_description'=>'Akira Toriyama is a Japanese manga artist and character designer. He first achieved mainstream recognition for his highly successful manga series Dr. Slump, before going on to create Dragon Ball.',
                    'author_image'=>'https://m.media-amazon.com/images/M/MV5BZTczMjRlNGYtMTUzYy00NjVmLThmOTYtM2VkMmVjODg1YzE4XkEyXkFqcGdeQXVyNjUwNzk3NDc@._V1_.jpg'
                ],

                [
                    'author_name'=>'Hirohiko Araki',
                    'author_description'=>'Hirohiko Araki is a Japanese manga artist. He is best known for his long-running series JoJos Bizarre Adventure, which began publication in Weekly Shōnen Jump in 1987 and has over 120 million copies in circulation, making it one of the best-selling manga series in history.',
                    'author_image'=>'https://static.jojowiki.com/images/thumb/8/83/latest/20210825034225/Hirohiko_Araki.png/400px-Hirohiko_Araki.png'
                ],

                [
                    'author_name'=>'Kentaro Miura',
                    'author_description'=>'Kentaro Miura was a Japanese manga artist. He was best known for his acclaimed dark fantasy series Berserk, which began serialization in 1989 and continued until his death. As of 2021, Berserk had more than 50 million copies in circulation, making it one of the best-selling manga series of all time.',
                    'author_image'=>'https://upload.wikimedia.org/wikipedia/en/1/1a/Kentaro_Miura.png'
                ],

                [
                    'author_name'=>'Junji Ito',
                    'author_description'=>'Junji Ito is a Japanese horror manga artist. Some of his most notable works include Tomie, a series chronicling an immortal girl who drives her stricken admirers to madness.',
                    'author_image'=>'https://upload.wikimedia.org/wikipedia/commons/thumb/a/ad/Junji_Ito_-_Lucca_Comics_%26_Games_2018_02.jpg/800px-Junji_Ito_-_Lucca_Comics_%26_Games_2018_02.jpg'
                ],

                [
                    'author_name'=>'Masashi Kishimoto',
                    'author_description'=>'Masashi Kishimoto is a Japanese manga artist. His manga series, Naruto, which was in serialization from 1999 to 2014, has sold over 250 million copies worldwide in 46 countries as of May 2019. The series has been adapted into two anime and multiple films, video games, and related media.',
                    'author_image'=>'https://cdn.myanimelist.net/images/voiceactors/2/42365.jpg'
                ],

                [
                    'author_name'=>'Rumiko Takahashi',
                    'author_description'=>'Rumiko Takahashi is a Japanese manga artist. With a career of several commercially successful works, beginning with Urusei Yatsura in 1978, Takahashi is one of Japan best-known and wealthiest manga artists.',
                    'author_image'=>'https://cdn.myanimelist.net/images/voiceactors/3/40140.jpg'
                ],

            ]);
    }
}
