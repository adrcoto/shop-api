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
            $table->string('title', 60);
            $table->string('slug', 60);
            $table->text('description');
            $table->float('price');
            $table->tinyInteger('currency');
            $table->tinyInteger('negotiable');
            $table->tinyInteger('change');

            $table->integer('category')->unsigned();
            $table->integer('sub_category')->unsigned();
            $table->integer('item_type')->unsigned();

            $table->string('city');
            $table->string('district');

//            $table->string('location');
            $table->tinyInteger('status');
            $table->integer('owner')->unsigned();

            $table->timestamps();
        });

        Schema::table('items', function ($table) {
            $table->foreign('category')->references('id')->on('categories')->onDelete('cascade');


            $table->foreign('sub_category')->references('id')->on('sub_categories')->onDelete('cascade');;
            $table->foreign('item_type')->references('id')->on('items_types')->onDelete('cascade');;

            $table->foreign('owner')->references('id')->on('users')->onDelete('cascade')->onDelete('cascade');;
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
