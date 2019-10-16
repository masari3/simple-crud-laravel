<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 1; $i++) { 
            \App\User::create([
                'nama' => 'Fitri Ariyanto, Sdbi',
                'email' => 'admin@mail.com',
                'hp' => rand(111111111111, 999999999999),
                'foto' => 'avatar.png',
                'password' => bcrypt('1'),
            ]);
        }
    }
}
