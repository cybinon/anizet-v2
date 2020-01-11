<?php

use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert(
            [
                [
                    'user_id' => "1",
                    'method' => "2",
                    'caption' => "sachiiro no one room",
                    'episodes' => "10",
                    'season' => "1",
                    'pg' => "PG-13",
                    'trailer' => "g7PvEmaz2jI",
                    'status' => "1",
                    'image' => "uploads/F2uPWEyqJnEsV7h3702ABTuhDcjN6ZOERj7wiLDP.jpeg",
                ],
                [
                    'user_id' => "1",
                    'method' => "1",
                    'caption' => "re:zero kara hajimeru isekai seikatsu",
                    'episodes' => "25",
                    'season' => "1",
                    'pg' => "PG-17",
                    'trailer' => "t6tCDc2er-s",
                    'status' => "1",
                    'image' => "uploads/uujKgKhCzr0hpxzYSfEJTKfohEuR9HhquIpSs8iL.jpeg",
                ],
                [
                    'user_id' => "1",
                    'method' => "1",
                    'episodes' => "13",
                    'season' => "1",
                    'pg' => "PG-17",
                    'trailer' => "rodadH4CEII",
                    'status' => "1",
                    'caption' => "serial experiments lain",
                    'image' => "uploads/BtVtyQ38nXe1T7lJzQqStg7dknOmcqzjKkbw0TVE.jpeg",
                ],


            ]
        );
    }
}
