<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('item_id');
            $table->string('title', 100);
            $table->text('description');
            $table->float('price');
            $table->tinyInteger('currency');
            $table->integer('category')->unsigned();
            $table->string('location');
            $table->tinyInteger('status');
            $table->integer('owner')->unsigned();
            $table->timestamps();
        });

        Schema::table('items', function ($table) {
            $table->foreign('category')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('owner')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
