<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(CookingTypesTableSeeder::class);
        $this->call(CourseTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(FoodItemTableSeeder::class);
        $this->call(OrdersTableSeeder::class);
        $this->call(CookingTypeUserTableSeeder::class);
        $this->call(OrderFoodItemTableSeeder::class);
        $this->call(CategoryFoodItemTableSeeder::class);
    }
}
