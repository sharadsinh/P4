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

        $user = \App\User::firstOrCreate(['email' => 'john@harvard.edu']);
        $user->firstname = 'John';
        $user->lastname = 'Brown';
        $user->email = 'john@harvard.edu';
        $user->password = \Hash::make('helloworld');
        $user->save();

        $user = \App\User::firstOrCreate(['email' => 'thomas@harvard.edu']);
        $user->firstname = 'Thomas';
        $user->lastname = 'King';
        $user->email = 'thomas@harvard.edu';
        $user->password = \Hash::make('helloworld');
        $user->save();

        $user = \App\User::firstOrCreate(['email' => 'mary@harvard.edu']);
        $user->firstname = 'Mary';
        $user->lastname = 'Parker';
        $user->email = 'mary@harvard.edu';
        $user->password = \Hash::make('helloworld');
        $user->save();

        $user = \App\User::firstOrCreate(['email' => 'sarah@harvard.edu']);
        $user->firstname = 'Sarah';
        $user->lastname = 'Collins';
        $user->email = 'sarah@harvard.edu';
        $user->password = \Hash::make('helloworld');
        $user->save();

        $user = \App\User::firstOrCreate(['email' => 'linda@harvard.edu']);
        $user->firstname = 'Linda';
        $user->lastname = 'Phillips';
        $user->email = 'linda@harvard.edu';
        $user->password = \Hash::make('helloworld');
        $user->save();
    }
}
