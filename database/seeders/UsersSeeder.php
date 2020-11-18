<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'User 1',
            'email' => 'user1@email.com',
            'password' => bcrypt('1234'),
        ]);
        DB::table('users')->insert([
            'name' => 'User 2',
            'email' => 'user2@email.com',
            'password' => bcrypt('1234'),
        ]);
    }
}
