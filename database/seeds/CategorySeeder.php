<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert(
            [
                [
                'caption_en' => 'Action',
                'caption_mn' => 'Тулаант, адал явдалт',
                ],
                [
                'caption_en' => 'Adventure',
                'caption_mn' => 'Адал явдал',
                ],
                [
                'caption_en' => 'Cars',
                'caption_mn' => 'Машин',
                ],
                [
                'caption_en' => 'Comedy',
                'caption_mn' => 'Инээдмийн',
                ],
                [
                'caption_en' => 'Dementia',
                'caption_mn' => 'Сэтгэцийн',
                ],
                [
                'caption_en' => 'Demons',
                'caption_mn' => 'Чөтгөр',
                ],
                [
                'caption_en' => 'Drama',
                'caption_mn' => 'Драм',
                ],
                [
                'caption_en' => 'Ecchi',
                'caption_mn' => 'Эччи',
                ],
                [
                'caption_en' => 'Fantasy',
                'caption_mn' => 'Уран зөгнөлт',
                ],
                [
                'caption_en' => 'Game',
                'caption_mn' => 'Тоглоом',
                ],
                [
                'caption_en' => 'Harem',
                'caption_mn' => 'Харем',
                ],
                [
                'caption_en' => 'Hentai',
                'caption_mn' => 'Хэнтай',
                ],
                [
                'caption_en' => 'Historical',
                'caption_mn' => 'Түүхэн',
                ],
                [
                'caption_en' => 'Horror',
                'caption_mn' => 'Аймшгийн',
                ],
                [
                'caption_en' => 'Josei',
                'caption_mn' => 'Насанд хүрсэн эмэгтэйчүүдэд',
                ],
                [
                'caption_en' => 'Kids',
                'caption_mn' => 'Бага насны',
                ],
                [
                'caption_en' => 'Magic',
                'caption_mn' => 'Ид шид',
                ],
                [
                'caption_en' => 'Martial Arts',
                'caption_mn' => 'Тулааны урлаг',
                ],
                [
                'caption_en' => 'Mecha',
                'caption_mn' => 'Мека',
                ],
                [
                'caption_en' => 'Military',
                'caption_mn' => 'Цэрэг армийн',
                ],
                [
                'caption_en' => 'Music',
                'caption_mn' => 'Хөгжим',
                ],
                [
                'caption_en' => 'Mystery',
                'caption_mn' => 'Нууцлаг',
                ],
                [
                'caption_en' => 'Paradoy',
                'caption_mn' => 'Элэглэл',
                ],
                [
                'caption_en' => 'Police',
                'caption_mn' => 'Цагдаа',
                ],
                [
                'caption_en' => 'Psychological',
                'caption_mn' => 'Сэтгэн зүйн',
                ],
                [
                'caption_en' => 'Romance',
                'caption_mn' => 'Хайр дурлалт',
                ],
                [
                'caption_en' => 'Samurai',
                'caption_mn' => 'Самүрай',
                ],
                [
                'caption_en' => 'School',
                'caption_mn' => 'Сургууль',
                ],
                [
                'caption_en' => 'Sci-Fi',
                'caption_mn' => 'Шинжлэх ухаант, уран зөгнөлт',
                ],
                [
                'caption_en' => 'Seinen',
                'caption_mn' => 'Насанд хүрэгчдийн',
                ],
                [
                'caption_en' => 'Shoujo',
                'caption_mn' => 'Охидын',
                ],
                [
                'caption_en' => 'Shoujo Ai',
                'caption_mn' => 'Охидын хайр дурлалт',
                ],
                [
                'caption_en' => 'Shounen',
                'caption_mn' => 'Хөвгүүдийн',
                ],
                [
                'caption_en' => 'Shounen Ai',
                'caption_mn' => 'Хөвгүүдийн хайр дурлалт',
                ],
                [
                'caption_en' => 'Slice of Life',
                'caption_mn' => 'Эгэл амьдралтай',
                ],
                [
                'caption_en' => 'Space',
                'caption_mn' => 'Сансар огторгуй',
                ],
                [
                'caption_en' => 'Sports',
                'caption_mn' => 'Спорт',
                ],
                [
                'caption_en' => 'Super Power',
                'caption_mn' => 'Супер хүчтэй',
                ],
                [
                'caption_en' => 'Super Natural',
                'caption_mn' => 'Ер бусын',
                ],
                [
                'caption_en' => 'Thriller',
                'caption_mn' => 'Дуулиант',
                ],
                [
                'caption_en' => 'Vampire',
                'caption_mn' => 'Цус сорогчтой',
                ],
                [
                'caption_en' => 'Yaoi',
                'caption_mn' => 'Яои',
                ],
                [
                'caption_en' => 'Yuri',
                'caption_mn' => 'Юри',
                ],
        ]);
    }
}
