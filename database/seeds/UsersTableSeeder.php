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
        $user = \App\User::firstOrCreate(['email' => 'jill@harvard.edu']);
        $user->firstname = 'Jill';
        $user->lastname = 'Smith';
        $user->email = 'jill@harvard.edu';
        $user->password = \Hash::make('helloworld');
        $user->save();

        $user = \App\User::firstOrCreate(['email' => 'jamal@harvard.edu']);
        $user->firstname = 'Jamal';
        $user->lastname = 'Johnson';
        $user->email = 'jamal@harvard.edu';
        $user->password = \Hash::make('helloworld');
        $user->save();
    }
}
