<?php

use Illuminate\Database\Seeder;

class users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
        [
            [
            'name' => 'nikoru',
            'username' => 'nikoru',
            'email' => 'nikorunikk@gmail.com',
            'password' => bcrypt('0250@Nik'),
            ],
            [
            'name' => 'melo',
            'username' => 'melo',
            'email' => 's.temuujin27@gmail.com',
            'password' => '$2y$10$46vC/TJh0lbGu5w2NdVkju7kQjfO0ocT5xvsKt.tnHLdIztimIflG',
            ],
            [
            'name' => 'Sanchirmaa',
            'username' => 'chessbelle89',
            'email' => 'chessbelle@gmail.com',
            'password' => '$2y$10$PEzDvozVMhNXsPN7j0zhW.WQHVxNvXKsZDewNyuWxrdDqf3YTsvWa',
            ],
            [
            'name' => 'Tuguldur',
            'username' => 'Tugo ',
            'email' => 'Verbdvdd@gmail.com',
            'password' => '$2y$10$3Z6CAVRkf8eOgGkTEyf/IOSKwDONwp1vRBVVHmmj4h7H7zY/zjJhq',
            ],
        ]);
    }
}
