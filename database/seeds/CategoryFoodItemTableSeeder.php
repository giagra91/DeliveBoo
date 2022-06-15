<?php

use App\Models\Category;
use App\Models\FoodItem;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class CategoryFoodItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $categoryIds = Category::pluck('id')->toArray();

        $foods = FoodItem::all();
        foreach($foods as $food){
            $food->categories()->sync( $faker->randomElements($categoryIds, 3));
        };
    }
}
