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
        // start to file this stuff in
        DB::table('users')->insert([
            'id' => 1,
            'name' => str_random(20),
            'email' => str_random(20) . "@gmail.com",
            'username' => 'mhuerta',
            'password' => bcrypt('test')
        ]);
    }
}
