<?php

use Illuminate\Database\Seeder;

class RatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ratings')->insert(
            [
                [
                'symbol' => 'PG-13',
                'age' => 13,
                ],
                [
                'symbol' => 'PG-17',
                'age' => 17,
                ],
                [
                'symbol' => 'Kids',
                'age' => 4,
                ],
                [
                'symbol' => 'Family',
                'age' => 0,
                ],
            ]
            );
    }
}
