<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoreUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('store_user', function (Blueprint $table) {

             $table->increments('id');
             $table->timestamps();

             # `store_id` and `user_id` will be foreign keys, so they have to be unsigned
             #  Note how the field names here correspond to the tables they will connect...
             # `store_id` will reference the `stores table` and `user_id` will reference the `users` table.
             $table->integer('store_id')->unsigned();
             $table->integer('user_id')->unsigned();

             # Make foreign keys
             $table->foreign('store_id')->references('id')->on('stores');
             $table->foreign('user_id')->references('id')->on('users');
         });
     }

     public function down()
     {
         Schema::drop('store_user');
     }
}
