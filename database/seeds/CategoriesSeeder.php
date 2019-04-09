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
        Category::create(['name' => 'Electronice - Electrocasnice']);
        Category::create(['name' => 'Auto - Moto - Nautica']);
        Category::create(['name' => 'Imobiliare']);
    }
}
