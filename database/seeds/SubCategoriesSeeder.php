<?php

use Illuminate\Database\Seeder;
use App\SubCategory;

/**
 * Class SubCategoriesSeeder
 */

class SubCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        foreach (SubCategory::SUB_CATEGORIES as $SUB_CATEGORY)
            SubCategory::create([
                'category' => $SUB_CATEGORY['category'],
                'name' => $SUB_CATEGORY['name']
            ]);
    }
}
