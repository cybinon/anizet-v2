<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(AnimeSeeder::class);
        $this->call(NovelSeeder::class);
        $this->call(SeasonSeeder::class);
        $this->call(VideoSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(RatingSeeder::class);
    }
}
