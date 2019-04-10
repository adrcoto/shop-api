<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('item')->unsigned();
            $table->integer('category')->unsigned();
            $table->integer('sub_category')->unsigned();

            $table->string('manufacturer', 25);
            $table->string('model', 50);
            $table->string('body', 25);
            $table->string('fuel_type', 25);
            $table->string('manufacturer_year', 4);
            $table->string('mileage', 20);
            $table->unsignedTinyInteger('status');
            $table->string('engine', 25);
            $table->string('origin', 25);
            $table->string('power', 25);
            $table->string('gearbox', 25);
            $table->string('drive', 15);
            $table->string('emission_class', 25);
            $table->string('color', 15);
            $table->string('VIN', 17);
            $table->unsignedTinyInteger('pollution_tax');
            $table->unsignedTinyInteger('damaged');
            $table->unsignedTinyInteger('registered');
            $table->unsignedTinyInteger('first_owner');
            $table->unsignedTinyInteger('right_hand_drive');

            $table->timestamps();
        });

        Schema::table('cars', function ($table){
            $table->foreign('item')->references('id')->on('items')->onDelete('cascade');
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
        Schema::dropIfExists('cars');
    }
}
