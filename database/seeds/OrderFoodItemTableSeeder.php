<?php

use App\Models\Order;
use App\Models\FoodItem;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class OrderFoodItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $foodIds = FoodItem::pluck('id')->toArray();

        $orders = Order::all();
        foreach($orders as $order){
            $order->foodItems()->sync( $faker->randomElements($foodIds, 3));
        };
    }
}
