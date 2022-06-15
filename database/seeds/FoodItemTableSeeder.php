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

        $foodItemOne = new FoodItem();
        $foodItemOne->name = "Spaghetti alla carbonara";
        $foodItemOne->user_id = 1;
        $foodItemOne->course_id = 2;
        $foodItemOne->price = 8.50;
        $foodItemOne->description = $faker->realText(50);
        $foodItemOne->ingredients = "fettuccine, carne bovina, passata di pomodoro";
        $foodItemOne->img_url = asset("img/carbonara-pasta-in-corso.jpeg");
        $foodItemOne->is_visible = true;
        $foodItemOne->save();

        $foodItemTwo = new FoodItem();
        $foodItemTwo->name = "Lasagna al ragù";
        $foodItemTwo->user_id = 1;
        $foodItemTwo->course_id = 2;
        $foodItemTwo->price = 8.50;
        $foodItemTwo->description = $faker->realText(50);
        $foodItemTwo->ingredients = "spaghetti, uovo, guanciale, pecorino romano, pepe nero";
        $foodItemTwo->img_url = asset("img/lasagna-pasta-in-corso.jpeg");
        $foodItemTwo->is_visible = true;
        $foodItemTwo->save();

        $foodItemThree = new FoodItem();
        $foodItemThree->name = "Tonnarello cacio e pepe";
        $foodItemThree->user_id = 2;
        $foodItemThree->course_id = 2;
        $foodItemThree->price = 9.50;
        $foodItemThree->description = $faker->realText(50);
        $foodItemThree->ingredients = "Acqua, farina, uova e tanto amore! Tutte le nostre paste vengono servite con parmigiano reggiano DOP O Pecorino, secondo tradizione.";
        $foodItemThree->img_url = asset("img/tonnarello cacio e pepe.jpeg");
        $foodItemThree->is_visible = true;
        $foodItemThree->save();

        $foodItemFour = new FoodItem();
        $foodItemFour->name = "Saltimbocca alla Romana con purè di patate";
        $foodItemFour->user_id = 2;
        $foodItemFour->course_id = 2;
        $foodItemFour->price = 14.50;
        $foodItemFour->description = $faker->realText(50);
        $foodItemFour->ingredients = "patate, sugo, carne e tradizione!";
        $foodItemFour->img_url = asset("img/saltimbocca-alla-romana.jpeg");
        $foodItemFour->is_visible = true;
        $foodItemFour->save();

        $foodItemFive = new FoodItem();
        $foodItemFive->name = "Crostino di patate, speck, provola e porcini";
        $foodItemFive->user_id = 3;
        $foodItemFive->course_id = 1;
        $foodItemFive->price = 12.00;
        $foodItemFive->description = $faker->realText(50);
        $foodItemFive->ingredients = "patate, provola affumicata, speck, formaggio, funghi porcini";
        $foodItemFive->img_url = asset("img/crostini-patate-funghi-speck-11.jpeg");
        $foodItemFive->is_visible = true;
        $foodItemFive->save();

        $foodItemSix = new FoodItem();
        $foodItemSix->name = "Pinsa Mia";
        $foodItemSix->user_id = 3;
        $foodItemSix->course_id = 3;
        $foodItemSix->price = 9.50;
        $foodItemSix->description = $faker->realText(50);
        $foodItemSix->ingredients = "salsa tonnata, rughetta, carciofini, arrosto, olive, grana e pomodori secchi";
        $foodItemSix->img_url = asset("img/pinsa-mia.jpeg");
        $foodItemSix->is_visible = true;
        $foodItemSix->save();

        $foodItemSeven = new FoodItem();
        $foodItemSeven->name = "Carpaccio";
        $foodItemSeven->user_id = 4;
        $foodItemSeven->course_id = 1;
        $foodItemSeven->price = 16.00;
        $foodItemSeven->description = $faker->realText(50);
        $foodItemSeven->ingredients = "Carpaccio di manzo 'Pezzata Rossa' marinato alle spezie del mediterraneo, con frutti di bosco e aceto balsamico ai lamponi";
        $foodItemSeven->img_url = asset("img/carpaccio.jpeg");
        $foodItemSeven->is_visible = true;
        $foodItemSeven->save();

        $foodItemEight = new FoodItem();
        $foodItemEight->name = "Pesce Spada";
        $foodItemEight->user_id = 4;
        $foodItemEight->course_id = 3;
        $foodItemEight->price = 13.00;
        $foodItemEight->description = $faker->realText(50);
        $foodItemEight->ingredients = "Pesce spada affumicato su mousse di formaggio fresco all’aneto e cetriolo con pepe rosa";
        $foodItemEight->img_url = asset("img/pesce spada.jpeg");
        $foodItemEight->is_visible = true;
        $foodItemEight->save();
        
    }
}
