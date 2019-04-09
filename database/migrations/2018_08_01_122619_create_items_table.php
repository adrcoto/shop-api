<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateTasksTable
 */
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
            $table->increments('id');
            $table->string('title', 100);
            $table->text('description');
            $table->float('price');
            $table->tinyInteger('currency');
            $table->integer('category')->unsigned();
            $table->foreign('category')->references('id')->on('categories');
            $table->integer('sub_category')->unsigned();
            $table->foreign('sub_category')->references('id')->on('sub_categories');
            $table->string('location');
            $table->tinyInteger('status');
            $table->integer('owner');
            $table->timestamps();
        });
    }
    /*
'title',
'description',
'price',
'currency',
'image',
'category',
'sub_category',
'location',
'status',
'owner'
    */
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
