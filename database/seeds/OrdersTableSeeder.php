<?php

use App\User;
use App\Models\Order;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
    
    $userIds = User::pluck('id')->toArray();

        for ($i=0; $i < 10; $i++) { 
            $order = new Order();
            $order->user_id = $faker->randomElement($userIds);
            $order->customer_name = $faker->name();
            $order->customer_address = $faker->streetAddress();
            $order->order_date = $faker->dateTimeBetween("-1 hour", "+1 hour");
            $order->pickup_date = $faker->dateTimeBetween("-1 hour", "+1 hour");
            $order->customer_email = $faker->email();
            $order->amount = $faker->randomFloat(2, 10, 99);
            $order->save();
        }


    }
}