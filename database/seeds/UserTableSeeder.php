<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Cesar GI',
            'email' => 'cesar10garcia1@gmail.com',
            'password' =>  bcrypt('garcia')
        ]);
    }
}
