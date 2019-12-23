<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('videos')->insert(
            [
                [
                    'post_id' => "1",
                    'path_id' => "1",
                    'file_id' => 16290625154,
                    'episode' => "1",
                    'skip_intro' => "118",
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'post_id' => "1",
                    'path_id' => "1",
                    'file_id' => 16290625154,
                    'episode' => "2",
                    'skip_intro' => "118",
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
            ]
        );
    }
}
