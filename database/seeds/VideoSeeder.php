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
                    'file_id' => 17956979240,
                    'episode' => "1",
                    'skip_intro' => "205",
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'post_id' => "1",
                    'path_id' => "1",
                    'file_id' => 17957109767,
                    'episode' => "2",
                    'skip_intro' => "140",
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'post_id' => "1",
                    'path_id' => "1",
                    'file_id' => 17957289777,
                    'episode' => "3",
                    'skip_intro' => "115",
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'post_id' => "1",
                    'path_id' => "1",
                    'file_id' => 17957446805,
                    'episode' => "4",
                    'skip_intro' => "174",
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'post_id' => "1",
                    'path_id' => "1",
                    'file_id' => 17957587013,
                    'episode' => "5",
                    'skip_intro' => "127",
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'post_id' => "1",
                    'path_id' => "1",
                    'file_id' => 17957907492,
                    'episode' => "6",
                    'skip_intro' => "124",
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'post_id' => "1",
                    'path_id' => "1",
                    'file_id' => 17958062476,
                    'episode' => "7",
                    'skip_intro' => "205",
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'post_id' => "1",
                    'path_id' => "1",
                    'file_id' => 17958205813,
                    'episode' => "8",
                    'skip_intro' => "175",
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'post_id' => "1",
                    'path_id' => "1",
                    'file_id' => 17958350160,
                    'episode' => "9",
                    'skip_intro' => "189",
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'post_id' => "1",
                    'path_id' => "1",
                    'file_id' => 17958486879,
                    'episode' => "10",
                    'skip_intro' => "106",
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'post_id' => "1",
                    'path_id' => "1",
                    'file_id' => 17956806407,
                    'episode' => "11",
                    'skip_intro' => "117",
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
            ]
        );
    }
}
