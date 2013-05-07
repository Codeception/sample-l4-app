<?php

class UsersTableSeederTableSeeder extends Seeder {

    public function run()
    {
        $users = array(
            array('email' => 'john@doe.com', 'password' => Hash::make('password'))
        );

        // Uncomment the below to run the seeder
        DB::table('users')->insert($users);
    }

}