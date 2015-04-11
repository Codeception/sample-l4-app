<?php

class UsersTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();
        User::create(array('email' => 'john@doe.com', 'password' => Hash::make('password')));
    }

}