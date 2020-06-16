<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Video;
use Faker\Generator as Faker;

$factory->define(Video::class, function (Faker $faker) {
    return [
        'season_id' => $faker->numberBetween($min = 10, $max = 20),
        'file_id' => $faker->numberBetween($min = 1, $max = 10),
        'episode_number' => 1,
        'episode_caption' => 'Анги нэр',
        'next_episode' => 2,
        'previous_episode' => null,
        'starting_opening' => 0,
        'starting_intro' => null,
        'starting_ending' => 1340,
        'starting_addition' => null,
        'duration_opening' => 96,
        'duration_intro' => null,
        'duration_ending' => 94,
        'duration_addition' => null,
    ];
});
