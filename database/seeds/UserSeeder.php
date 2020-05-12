<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'nikoru',
            'email' => 'nikorunikk@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('0250@Nik'),
            'remember_token' => Str::random(10),

        ]);
        factory(\App\User::class, 50)->create();
    }
}
