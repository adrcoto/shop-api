<?php

use App\ItemsImage;
use Illuminate\Database\Seeder;
use App\Vehicle;
use App\Electronic;
use App\ItemsType;
use App\Category;
use App\SubCategory;
use App\Item;

use Illuminate\Support\Facades\Storage;

/**
 * Class ItemsSeeder
 */
class ItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $item = new Item();

        $item->title = "Porsche Cayenne 2018";
        $item->description = "Tot ce-i trebuie, full option !!!";
        $item->price = 75000;
        $item->currency = 1;
        $item->category = Category::AUTO_MOTO_NAUTICA;
        $item->location = "Craiova";
        $item->status = Item::STATUS_ACTIVE;
        $item->owner = 2;

        $item->save();

    }

}
