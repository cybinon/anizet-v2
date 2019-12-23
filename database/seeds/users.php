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
        DB::table('users')->insert([
            'name' => 'nikoru',
            'username' => 'nikoru',
            'email' => 'nikorunikk@gmail.com',
            'password' => bcrypt('0250@Nik'),
        ]);
    }
}
