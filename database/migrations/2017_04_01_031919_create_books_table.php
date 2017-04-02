<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function(Blueprint $table){
            // id
            $table->increments('id');
            // name
            $table->string('name');
            // author
            $table->string('author');
            // description
            $table->text('description');
            // year released
            $table->integer('year_released');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // drop the table
        Schema::drop('books');
    }
}
