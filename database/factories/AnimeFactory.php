<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Animes;
use Faker\Generator as Faker;



$factory->define(Animes::class, function (Faker $faker) {

    $id = rand(0,7);
    $en = array ('Tower of God', 'Gintama', 'Kakushigoto', 'Yesterday wo Utatte','Yondemasu yo, Azazel-san.','Bakuman.','Shigatsu wa Kimi no Uso','Shinsekai Yori');
    $mn = array ('Бурхны цамхаг', 'Гинтама', 'Какүшигото', 'Өчигдрийг дуулаач','Дуудаад байна ш дээ Азазэл-сан','Бакуман.','4 сар дахь чиний худал','Шинэ ертөнцөөс');
    $kanji = array ('神之塔', '銀魂', 'かくしごと', 'イエスタデイをうたって','よんでますよ、アザゼルさん','バクマン。','四月は君の嘘','新世界より');


    $en = $en[$id];
    $mn = $mn[$id];
    $kanji = $kanji[$id];

    return [
        'user_id' => 1000,
        'caption_en' => $en,
        'caption_mn' => $mn,
        'caption_kanji' => $kanji,
        'rating' => $faker->randomElement($array = array('PG-13','PG-17','Family')),
        'category' => '"1","22","30","39"',
    ];
});
