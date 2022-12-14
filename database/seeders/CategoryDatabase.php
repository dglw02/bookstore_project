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
                    'category_name'=>'Fiction',
                    'category_image'=>'https://journeytozerostories.neste.com/sites/default/files/styles/wide_m/public/2021-03/HERO%20Q1_design%20fiction_Illustration%20Brett%20Ryder.jpg?ts=1616060261&itok=t_shCfk7',
                    'category_description'=>'fiction, literature created from the imagination, not presented as fact, though it may be based on a true story or situation. Types of literature in the fiction genre include the novel, short story, and novella. The word is from the Latin fictio, the act of making, fashioning, or molding.'
                ],

                [
                    'category_name'=>'Non-Fiction',
                    'category_image'=>'https://s26162.pcdn.co/wp-content/uploads/2019/10/nonfiction.jpg',
                    'category_description'=>'the branch of literature comprising works of narrative prose dealing with or offering opinions or conjectures upon facts and reality, including biography, history, and the essay (opposed to fiction and distinguished from poetry and drama). works of this class: She had read all of his novels but none of his nonfiction.'
                ],


                [
                    'category_name'=>'Manga',
                    'category_image'=>'https://staticg.sportskeeda.com/editor/2022/03/59485-16462404746687-1920.jpg',
                    'category_description'=>'Manga are comics or graphic novels originating from Japan. Most manga conform to a style developed in Japan in the late 19th century, and the form has a long prehistory in earlier Japanese art. The term manga is used in Japan to refer to both comics and cartooning.'
                ],


            ]);
    }
}
