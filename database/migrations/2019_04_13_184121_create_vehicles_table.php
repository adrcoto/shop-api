<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('item_id')->unsigned()->unique();
            $table->integer('sub_category')->unsigned();
            $table->integer('item_type')->unsigned();

            $table->string('manufacturer');
            $table->string('model');
            $table->string('body');
            $table->string('fuel_type');
            $table->string('manufacturer_year', 4);
            $table->string('mileage');
            $table->boolean('used');
            $table->integer('engine')->unsigned();
            $table->string('origin');
            $table->integer('power')->unsigned();
            $table->string('gearbox');
            $table->string('drive');
            $table->string('emission_class');
            $table->string('color', 15);
            $table->string('VIN', 17);
            $table->boolean('pollution_tax');
            $table->boolean('damaged');
            $table->boolean('registered');
            $table->boolean('first_owner');
            $table->boolean('right_hand_drive');
            $table->timestamps();
        });

        Schema::table('vehicles', function ($table){
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
        Schema::dropIfExists('vehicles');
    }
}