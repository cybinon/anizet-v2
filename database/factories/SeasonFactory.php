<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Season;
use Faker\Generator as Faker;

$factory->define(Season::class, function (Faker $faker) {
    return [
        'anime_id'=> $faker->numberBetween($min = 1000, $max = 1005),
        'number' => $faker->randomDigit,
        'name' => $faker->name,
        'status' => 1,
        'trailer' => 'https://youtu.be/NfDpTpfhLic',
        'image_width' => 'https://upload.wikimedia.org/wikipedia/en/thumb/7/7d/Tower_of_God_Volume_1_Cover.jpg/220px-Tower_of_God_Volume_1_Cover.jpg',
        'image_height' => 'https://cdn.myanimelist.net/images/anime/1702/106229.jpg'
    ];
});
