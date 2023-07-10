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
                /*fiction books*/
                [
                    'books_name'=>'The Blue Lotus',
                    'category_id'=>'1',
                    'publisher_id'=>'1',
                    'books_description'=>'Surviving several attempts on his life by mysterious assailants, Tintin attempts to leave for India by boat, but is kidnapped and brought back to China. His abductors reveal themselves as members of a secret society known as the Sons of the Dragon, who, like the Maharaja, are devoted to combating the opium trade.',
                    'books_author'=>'1',
                    'books_quantity'=>'40',
                    'books_image'=>'https://upload.wikimedia.org/wikipedia/en/5/57/The_Adventures_of_Tintin_-_05_-_The_Blue_Lotus.jpg',
                    'books_price'=>'40000',
                    'books_ISBN'=>'627234724',
                ],

                [
                    'books_name'=>'The Great Gatsby',
                    'category_id'=>'1',
                    'publisher_id'=>'2',
                    'books_description'=>'Set in the Jazz Age on Long Island, near New York City, the novel depicts first-person narrator Nick Carraway interactions with mysterious millionaire Jay Gatsby and Gatsby obsession to reunite with his former lover, Daisy Buchanan.',
                    'books_author'=>'5',
                    'books_quantity'=>'200',
                    'books_image'=>'https://upload.wikimedia.org/wikipedia/commons/7/7a/The_Great_Gatsby_Cover_1925_Retouched.jpg',
                    'books_price'=>'50000',
                    'books_ISBN'=>'267248951',
                ],

                [
                    'books_name'=>'The Adventures of Tom Sawyer',
                    'category_id'=>'1',
                    'publisher_id'=>'3',
                    'books_description'=>'The Adventures of Tom Sawyer is an 1876 novel by Mark Twain about a boy growing up along the Mississippi River. It is set in the 1840s in the town of St. Petersburg, which is based on Hannibal, Missouri, where Twain lived as a boy.',
                    'books_author'=>'4',
                    'books_quantity'=>'170',
                    'books_image'=>'https://m.media-amazon.com/images/I/41VWMa8-aeS._AC_SY780_.jpg',
                    'books_price'=>'30000',
                    'books_ISBN'=>'543175208',
                ],

                [
                    'books_name'=>'Romeo and Juliet',
                    'category_id'=>'1',
                    'publisher_id'=>'4',
                    'books_description'=>'Romeo and Juliet Summary. An age-old vendetta between two powerful families erupts into bloodshed. A group of masked Montagues risk further conflict by gatecrashing a Capulet party. A young lovesick Romeo Montague falls instantly in love with Juliet Capulet, who is due to marry her father choice, the County Paris.',
                    'books_author'=>'3',
                    'books_quantity'=>'490',
                    'books_image'=>'https://m.media-amazon.com/images/I/51ajznr23jL.jpg',
                    'books_price'=>'38000',
                    'books_ISBN'=>'854433785',
                ],

                [
                    'books_name'=>'It',
                    'category_id'=>'1',
                    'publisher_id'=>'1',
                    'books_description'=>'Seven young outcasts in Derry, Maine, are about to face their worst nightmare -- an ancient, shape-shifting evil that emerges from the sewer every 27 years to prey on the town children. Banding together over the course of one horrifying summer, the friends must overcome their own personal fears to battle the murderous, bloodthirsty clown known as Pennywise.',
                    'books_author'=>'2',
                    'books_quantity'=>'700',
                    'books_image'=>'https://d28hgpri8am2if.cloudfront.net/book_images/onix/cvr9781982127794/it-9781982127794_hr.jpg',
                    'books_price'=>'50000',
                    'books_ISBN'=>'95009838',
                ],

                [
                    'books_name'=>'The Shining',
                    'category_id'=>'1',
                    'publisher_id'=>'4',
                    'books_description'=>'Jack Torrance (Jack Nicholson) becomes winter caretaker at the isolated Overlook Hotel in Colorado, hoping to cure his writer block. He settles in along with his wife, Wendy (Shelley Duvall), and his son, Danny (Danny Lloyd), who is plagued by psychic premonitions. As Jack writing goes nowhere and Danny visions become more disturbing, Jack discovers the hotel dark secrets and begins to unravel into a homicidal maniac hell-bent on terrorizing his family.',
                    'books_author'=>'2',
                    'books_quantity'=>'300',
                    'books_image'=>'http://prodimage.images-bn.com/pimages/9780345806789_p0_v2_s1200x630.jpg',
                    'books_price'=>'65000',
                    'books_ISBN'=>'285405104',
                ],

                [
                    'books_name'=>'Pet Sematary',
                    'category_id'=>'1',
                    'publisher_id'=>'1',
                    'books_description'=>'Dr. Louis Creed and his wife, Rachel, relocate from Boston to rural Maine with their two young children. The couple soon discover a mysterious burial ground hidden deep in the woods near their new home. When tragedy strikes, Louis turns to his neighbor Jud Crandall, setting off a perilous chain reaction that unleashes an unspeakable evil with horrific consequences.',
                    'books_author'=>'2',
                    'books_quantity'=>'840',
                    'books_image'=>'https://upload.wikimedia.org/wikipedia/en/5/52/StephenKingPetSematary.jpg',
                    'books_price'=>'54000',
                    'books_ISBN'=>'477397104',
                ],

                [
                    'books_name'=>'Harry Potter',
                    'category_id'=>'1',
                    'publisher_id'=>'2',
                    'books_description'=>'The main story arc concerns Harry struggle against Lord Voldemort, a dark wizard who intends to become immortal, overthrow the wizard governing body known as the Ministry of Magic and subjugate all wizards and Muggles (non-magical people).',
                    'books_author'=>'1',
                    'books_quantity'=>'600',
                    'books_image'=>'http://prodimage.images-bn.com/pimages/9780545139700_p0_v5_s1200x630.jpg',
                    'books_price'=>'80000',
                    'books_ISBN'=>'199170471',
                ],
                /*Non-fiction books*/
                [
                    'books_name'=>'Ulysses',
                    'category_id'=>'2',
                    'publisher_id'=>'1',
                    'books_description'=>'Ulysses, a novel by the Irish writer James Joyce, is a key text of literary modernism. Divided into 18 chapters, it follows the structure of Homers Odyssey, the ancient Greek epic poem about Odysseuss journey home from the Trojan War to his wife Penelope in Ithaca.',
                    'books_author'=>'8',
                    'books_quantity'=>'50',
                    'books_image'=>'https://upload.wikimedia.org/wikipedia/commons/a/ab/JoyceUlysses2.jpg',
                    'books_price'=>'30000',
                    'books_ISBN'=>'329283442',
                ],

                [
                    'books_name'=>'Blonde',
                    'category_id'=>'2',
                    'publisher_id'=>'2',
                    'books_description'=>'The legend of Marilyn Monroe—aka Norma Jeane Baker—comes provocatively alive in this powerful tale of Hollywood myth and heartbreaking reality. Marilyn Monroe lives—reborn to tell her untold history; her story of a star created to shine brightest in the Hollywood firmament before her fall to earth.',
                    'books_author'=>'7',
                    'books_quantity'=>'312',
                    'books_image'=>'https://m.media-amazon.com/images/I/41cZKBgxCiL.jpg',
                    'books_price'=>'45000',
                    'books_ISBN'=>'871411668',
                ],

                [
                    'books_name'=>'War and Peace',
                    'category_id'=>'2',
                    'publisher_id'=>'3',
                    'books_description'=>'War and Peace broadly focuses on Napoleons invasion of Russia in 1812 and follows three of the most well-known characters in literature: Pierre Bezukhov, the illegitimate son of a count who is fighting for his inheritance and yearning for spiritual fulfillment',
                    'books_author'=>'6',
                    'books_quantity'=>'20',
                    'books_image'=>'https://m.media-amazon.com/images/I/51J1nb00FLL._AC_SY780_.jpg',
                    'books_price'=>'40000',
                    'books_ISBN'=>'164240435',
                ],

                [
                    'books_name'=>'The General Theory of Employment, Interest and Money',
                    'category_id'=>'2',
                    'publisher_id'=>'1',
                    'books_description'=>'The General Theory of Employment, Interest and Money is a book by English economist John Maynard Keynes published in February 1936. It caused a profound shift in economic thought, giving macroeconomics a central place in economic theory and contributing much of its terminology',
                    'books_author'=>'1',
                    'books_quantity'=>'20',
                    'books_image'=>'https://m.media-amazon.com/images/I/41Ifywm+YzL._AC_SY780_.jpg',
                    'books_price'=>'20000',
                    'books_ISBN'=>'475362919',
                ],

                [
                    'books_name'=>'Silent Spring',
                    'category_id'=>'2',
                    'publisher_id'=>'2',
                    'books_description'=>'Silent Spring is an environmental science book by Rachel Carson. Published on September 27, 1962, the book documented the environmental harm caused by the indiscriminate use of pesticides.',
                    'books_author'=>'1',
                    'books_quantity'=>'37',
                    'books_image'=>'https://m.media-amazon.com/images/I/41c0V+fE0rL._AC_SY780_.jpg',
                    'books_price'=>'86000',
                    'books_ISBN'=>'960797994',
                ],

                [
                    'books_name'=>'The Sixth Extinction: An Unnatural History',
                    'category_id'=>'2',
                    'publisher_id'=>'3',
                    'books_description'=>'The Sixth Extinction: An Unnatural History is a 2014 non-fiction book written by Elizabeth Kolbert and published by Henry Holt and Company. The book argues that the Earth is in the midst of a modern, man-made, sixth extinction.',
                    'books_author'=>'1',
                    'books_quantity'=>'40',
                    'books_image'=>'https://m.media-amazon.com/images/I/51boRaa39PL._AC_SY780_.jpg',
                    'books_price'=>'40000',
                    'books_ISBN'=>'898922731',
                ],

                [
                    'books_name'=>'Notes of a Native Son',
                    'category_id'=>'2',
                    'publisher_id'=>'3',
                    'books_description'=>'Notes of a Native Son is a collection of ten essays by James Baldwin, published in 1955, mostly tackling issues of race in America and Europe. The volume, as his first non-fiction book, compiles essays of Baldwin that had previously appeared in such magazines as Harper Magazine, Partisan Review, and The New Leader',
                    'books_author'=>'1',
                    'books_quantity'=>'140',
                    'books_image'=>'https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1348169754i/410810.jpg',
                    'books_price'=>'60000',
                    'books_ISBN'=>'803009494',
                ],

                [
                    'books_name'=>'The Double Helix',
                    'category_id'=>'2',
                    'publisher_id'=>'4',
                    'books_description'=>'The Double Helix: A Personal Account of the Discovery of the Structure of DNA is an autobiographical account of the discovery of the double helix structure of DNA written by James D. Watson and published in 1968.',
                    'books_author'=>'1',
                    'books_quantity'=>'510',
                    'books_image'=>'https://m.media-amazon.com/images/I/51AyqonNA3L._AC_SY780_.jpg',
                    'books_price'=>'36000',
                    'books_ISBN'=>'632115547',
                ],
                /*Manga book*/
                [
                    'books_name'=>'One Piece',
                    'category_id'=>'3',
                    'publisher_id'=>'3',
                    'books_description'=>'The series focuses on Monkey D. Luffy, a young man made of rubber, who, inspired by his childhood idol, the powerful pirate Red-Haired Shanks, sets off on a journey from the East Blue Sea to find the mythical treasure, the One Piece, and proclaim himself the King of the Pirates.',
                    'books_author'=>'9',
                    'books_quantity'=>'51',
                    'books_image'=>'https://upload.wikimedia.org/wikipedia/en/thumb/9/90/One_Piece%2C_Volume_61_Cover_%28Japanese%29.jpg/220px-One_Piece%2C_Volume_61_Cover_%28Japanese%29.jpg',
                    'books_price'=>'35000',
                    'books_ISBN'=>'168743475',
                ],

                [
                    'books_name'=>'Astro Boy',
                    'category_id'=>'3',
                    'publisher_id'=>'4',
                    'books_description'=>'In futuristic Metro City, a brilliant scientist named Tenma builds Astro Boy (Freddie Highmore), a robotic child with superstrength, X-ray vision and the ability to fly. Astro Boy sets out to explore the world and find acceptance, learning what being human is all about in the process. Finding that his friends and family in Metro City are in danger, he uses his incredible powers to save all that he loves.',
                    'books_author'=>'10',
                    'books_quantity'=>'86',
                    'books_image'=>'https://m.media-amazon.com/images/I/61UPAMOtEWL.jpg',
                    'books_price'=>'50000',
                    'books_ISBN'=>'539224614',
                ],

                [
                    'books_name'=>'Dragon Ball',
                    'category_id'=>'3',
                    'publisher_id'=>'1',
                    'books_description'=>'The series begins with a young monkey-tailed boy named Goku befriending a teenage girl named Bulma. Together, they go on an adventure to find the seven mystical Dragon Balls (ドラゴンボール), which have the ability to summon the powerful dragon Shenron, who can grant whomever summons him their greatest desire.',
                    'books_author'=>'11',
                    'books_quantity'=>'60',
                    'books_image'=>'https://upload.wikimedia.org/wikipedia/en/c/c9/DB_Tank%C5%8Dbon.png',
                    'books_price'=>'65000',
                    'books_ISBN'=>'270902143',
                ],

                [
                    'books_name'=>'JoJos Bizarre Adventure',
                    'category_id'=>'3',
                    'publisher_id'=>'3',
                    'books_description'=>'The story of the Joestar family, who are possessed with intense psychic strength, and the adventures each member encounters throughout their lives. Chronicles the struggles of the cursed Joestar bloodline against the forces of evil.',
                    'books_author'=>'12',
                    'books_quantity'=>'120',
                    'books_image'=>'https://upload.wikimedia.org/wikipedia/en/thumb/4/42/Steel_Ball_issue.jpg/220px-Steel_Ball_issue.jpg',
                    'books_price'=>'80000',
                    'books_ISBN'=>'515186345',
                ],

                [
                    'books_name'=>'Berserk',
                    'category_id'=>'3',
                    'publisher_id'=>'1',
                    'books_description'=>'Guts is a lone warrior who was born from a hanged corpse and raised as a mercenary by his abusive adoptive father Gambino. It came to a head when Guts was forced to kill a drunk Gambino in self-defense, fleeing his mercenary group and becomes a wandering sellsword.',
                    'books_author'=>'13',
                    'books_quantity'=>'250',
                    'books_image'=>'https://comicvine.gamespot.com/a/uploads/scale_small/6/67663/5971806-29.jpg',
                    'books_price'=>'78000',
                    'books_ISBN'=>'297090834',
                ],

                [
                    'books_name'=>'Tomie',
                    'category_id'=>'3',
                    'publisher_id'=>'2',
                    'books_description'=>'A mysterious, beautiful woman named Tomie Kawakami, identified by her sleek black hair and a beauty mark below her left eye. Tomie acts like a succubus, possessing an undisclosed power to make any man fall in love with her.',
                    'books_author'=>'14',
                    'books_quantity'=>'300',
                    'books_image'=>'https://m.media-amazon.com/images/I/51hzsc9HiUL.jpg',
                    'books_price'=>'83000',
                    'books_ISBN'=>'598684470',
                ],

                [
                    'books_name'=>'Naruto',
                    'category_id'=>'3',
                    'publisher_id'=>'3',
                    'books_description'=>'It tells the story of Naruto Uzumaki, a young ninja who seeks recognition from his peers and dreams of becoming the Hokage, the leader of his village.',
                    'books_author'=>'15',
                    'books_quantity'=>'400',
                    'books_image'=>'https://upload.wikimedia.org/wikipedia/en/9/94/NarutoCoverTankobon1.jpg',
                    'books_price'=>'64000',
                    'books_ISBN'=>'512851639',
                ],

                [
                    'books_name'=>'Inuyasha',
                    'category_id'=>'3',
                    'publisher_id'=>'4',
                    'books_description'=>'InuYasha is the story of a dog half-demon who is constantly after a jewel of immense power, the Shikon jewel, also no as the Shikon no tama. He lives in the forest near the village where the jewel is protected by a priestess named Kikyo.',
                    'books_author'=>'16',
                    'books_quantity'=>'200',
                    'books_image'=>'https://cdn-amz.woka.io/images/I/61664dSN-EL.jpg',
                    'books_price'=>'30000',
                    'books_ISBN'=>'434931571',
                ],
            ]);
    }
}
