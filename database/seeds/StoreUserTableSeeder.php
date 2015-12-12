<?php

use Illuminate\Database\Seeder;

class StoreUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            'Jill' => ['Walmart', 'Whole Foods'],
            'Jamal' => ['Whole Foods', 'Target'],
        ];

        foreach ($users as $firstname => $stores) {
            # first get the user
            $user = \App\User::where('firstname','LIKE',$firstname)->first();

            #loop through all the store names for each user and add to the pivot table
            foreach ($stores as $storeName) {
                $store = \App\Store::where('store_name','LIKE',$storeName)->first();

                # Connect this store to this user
                $user->stores()->save($store);
            }
        }
    }
}
