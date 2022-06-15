<?php

use App\User;
use App\Models\Course;
use App\Models\FoodItem;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;


class FoodItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $userIds = User::pluck("id")->toArray();
        $courseIds = Course::pluck("id")->toArray();

        $faker = \Faker\Factory::create();
        $faker->addProvider(new \FakerRestaurant\Provider\it_IT\Restaurant($faker));
        for ($i=0; $i < 10 ; $i++) { 
            $foodItem = new FoodItem();
            $foodItem->name = $faker->foodName();
            $foodItem->user_id = $faker->randomElement($userIds);
            $foodItem->course_id = $faker->randomElement($courseIds);
            $foodItem->price = $faker->randomFloat(2, 1, 999);
            $foodItem->description = $faker->realText(50);
            $foodItem->ingredients = $faker->words(4, true);
            $foodItem->img_url = "https://picsum.photos/900?random=" . $i;
            $foodItem->is_visible = $faker->boolean();
            $foodItem->save();
        }
        
    }
}
