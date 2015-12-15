<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConnetStoresAndItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::table('items', function(Blueprint $table) {
             # Add a new integer called store_id that is foreign key and unsigned (ie. positive)
             $table->integer('store_id')->unsigned();

             # This field `store_id` is a foreign key that connects to the `id` field in the `stores` table
             $table->foreign('store_id')->references('id')->on('stores');
         });
     }

     /**
      * Reverse the migrations.
      *
      * @return void
      */
     public function down()
     {
         Schema::table('items', function (Blueprint $table) {

             # ref: http://laravel.com/docs/5.1/migrations#dropping-indexes
             # combine tablename + fk field name + the word "foreign"
             $table->dropForeign('items_store_id_foreign');

             $table->dropColumn('store_id');
         });
     }
}
