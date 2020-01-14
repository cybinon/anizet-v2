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
                    'file_id' => 'https://drive.google.com/file/d/1o8Xc8QohaJdPENE3MiviqWX5-nGmrzfp/view',
                    'episode' => "1",
                    'skip_intro' => "205",
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'post_id' => "1",
                    'path_id' => "1",
                    'file_id' => 'https://drive.google.com/file/d/10K1mHvH-nPP3gdzmk7NMAC4B8OrD3wEh/view',
                    'episode' => "2",
                    'skip_intro' => "205",
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'post_id' => "2",
                    'path_id' => "1",
                    'file_id' => 'https://drive.google.com/file/d/1zaA8um4lILJ0pU0d8Ep03Ps2LJJHWVNM/view',
                    'episode' => "1",
                    'skip_intro' => "205",
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
            ]
        );
    }
}
