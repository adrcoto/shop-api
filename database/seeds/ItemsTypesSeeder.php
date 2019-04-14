<?php

use Illuminate\Database\Seeder;
use App\ItemsType;


/**
 * Class ItemsTypesSeeder
 */
class ItemsTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        foreach (ItemsType::ITEMS_TYPES as $ITEMS_TYPE)
            ItemsType::create([
                'category' => $ITEMS_TYPE['category'],
                'sub_category' => $ITEMS_TYPE['sub_category'],
                'name' => $ITEMS_TYPE['name']
            ]);
    }
}
