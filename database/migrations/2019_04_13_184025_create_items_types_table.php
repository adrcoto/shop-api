<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items_types', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category')->unsigned();
            $table->integer('sub_category')->unsigned();
            $table->string('name');
            $table->timestamps();
        });

        Schema::table('items_types', function ($table){
            $table->foreign('category')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('sub_category')->references('id')->on('sub_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items_types');
    }
}
