<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = ["vegetariano", "vegano", "gluten-free", "carne", "pesce", "dessert"];
        for ($i=0; $i < count($names) ; $i++) { 
            $category = new Category;
            $category->name = $names[$i];
            $category->save();
        }
    }
}
