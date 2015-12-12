<?php

use Illuminate\Database\Seeder;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$all_store = new \App\();
        $store_id = \App\Store::where('store_name','=','Walmart')->pluck('id');
        DB::table('items')->insert([
           'created_at' => Carbon\Carbon::now()->toDateTimeString(),
           'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
           'item_name' => 'Milk 2%',
           'quantity' => '2 Gallon',
           'store_aisle_num' => '14a',
           'store_id' => $store_id,
           'checked' => false,
       ]);

       $store_id = \App\Store::where('store_name','=','Walmart')->pluck('id');
       DB::table('items')->insert([
          'created_at' => Carbon\Carbon::now()->toDateTimeString(),
          'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
          'item_name' => 'Banana',
          'quantity' => '3 lb',
          'store_aisle_num' => '4',
          'store_id' => $store_id,
          'checked' => true,
      ]);

      $store_id = \App\Store::where('store_name','=','Walmart')->pluck('id');
      DB::table('items')->insert([
         'created_at' => Carbon\Carbon::now()->toDateTimeString(),
         'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
         'item_name' => 'Sugar',
         'quantity' => '2 lb',
         'store_aisle_num' => '2',
         'store_id' => $store_id,
         'checked' => false,
     ]);
    }
}
