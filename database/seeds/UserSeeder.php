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
            [
            'username' => 'nikoru',
            'admin_status' => 6,
            'email' => 'nikorunikk@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('0250@Nik'),
            'remember_token' => Str::random(10),
            ],
            [
                'username' => 'hitsukihoshi',
                'admin_status' => 6,
                'email' => 'temkatemka512@gmail.com',
                'email_verified_at' => now(),
                'password' => bcrypt('temka512'),
                'remember_token' => Str::random(10),
                ]

        ]);
        
        //factory(\App\User::class, 50)->create();
    }
}
