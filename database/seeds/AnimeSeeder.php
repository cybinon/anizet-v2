<?php

use Illuminate\Database\Seeder;


class AnimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Animes::class, 10)->create();
    }
}
