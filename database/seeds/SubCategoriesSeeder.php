<?php

use Illuminate\Database\Seeder;
use App\SubCategory;

/**
 * Class RolesSeeder
 */
class SubCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {

        SubCategory::create(['category' => 1,'name' => 'Laptop - PC - Periferice']);
        SubCategory::create(['category' => 1,'name' => 'Telefoane']);
        SubCategory::create(['category' => 1,'name' => 'TV - Audio - Foto - Video']);


        SubCategory::create(['category' => 2,'name' => 'Autoturisme']);
        SubCategory::create(['category' => 2,'name' => 'Motociclete - ATV - Scutere']);
        SubCategory::create(['category' => 2,'name' => 'Piese - Accesorii - Consumabile']);

        SubCategory::create(['category' => 3,'name' => 'Garsoniere de inchiriat']);
        SubCategory::create(['category' => 3,'name' => 'Garsoniere de cumparat']);
        SubCategory::create(['category' => 3,'name' => 'Spatii comerciale - Birouri']);
    }
}
