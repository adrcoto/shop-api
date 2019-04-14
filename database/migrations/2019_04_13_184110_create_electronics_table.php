<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateElectronicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('electronics', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('item_id')->unsigned()->unique();
            $table->integer('sub_category')->unsigned();
            $table->integer('item_type')->unsigned();

            $table->string('manufacturer');
            $table->string('model');
            $table->boolean('used');
            $table->timestamps();
        });

        Schema::table('electronics', function ($table){
            $table->foreign('item_id')->references('id')->on('items');
            $table->foreign('sub_category')->references('id')->on('sub_categories');
            $table->foreign('item_type')->references('id')->on('items_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('electronics');
    }
}
