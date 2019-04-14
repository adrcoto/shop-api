<?php

use Illuminate\Database\Seeder;
use App\Category;

/**
 * Class CategoriesSeeder
 */
class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        foreach (Category::CATEGORIES as $CATEGORY)
            Category::create(['name' => $CATEGORY]);
    }
}
