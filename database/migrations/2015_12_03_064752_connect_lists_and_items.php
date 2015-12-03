<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConnectListsAndItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('items', function(Blueprint $table) {
            # Add a new integer called list_id that is foreign key and unsigned (ie. positive)
            $table->integer('list_id')->unsigned();

            # This field `list_id` is a foreign key that connects to the `id` field in the `lists` table
            $table->foreign('list_id')->references('id')->on('lists');

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
            $table->dropForeign('items_list_id_foreign');

            $table->dropColumn('list_id');
        });
    }
}
