<?php

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        User::create(array(
            'email' => 'fideloper@gmail.com',
            'password' => Hash::make('password'), #lolerbomb
            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ));
    }
}