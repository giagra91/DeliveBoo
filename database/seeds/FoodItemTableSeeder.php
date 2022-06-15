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

        $foodItemNine = new FoodItem();
        $foodItemNine->name = "Tagliatelle Speck, Fiori di Zucca e Zucchine";
        $foodItemNine->user_id = 5;
        $foodItemNine->course_id = 2;
        $foodItemNine->price = 12.00;
        $foodItemNine->description = $faker->realText(50);
        $foodItemNine->ingredients = "Speck, Fiori di Zucca e Zucchine";
        $foodItemNine->img_url = asset("img/tagliatelle-ai-fiori-di-zucca.jpeg");
        $foodItemNine->is_visible = true;
        $foodItemNine->save();

        $foodItemTen = new FoodItem();
        $foodItemTen->name = "Filetto al pepe verde";
        $foodItemTen->user_id = 5;
        $foodItemTen->course_id = 2;
        $foodItemTen->price = 18.00;
        $foodItemTen->description = $faker->realText(50);
        $foodItemTen->ingredients = "Filetto, pepe verde";
        $foodItemTen->img_url = asset("img/Filetto-al-pepe-verde-e-senape.jpeg");
        $foodItemTen->is_visible = true;
        $foodItemTen->save();

        $foodItemEleven = new FoodItem();
        $foodItemEleven->name = "Paccheri allo scoglio";
        $foodItemEleven->user_id = 6;
        $foodItemEleven->course_id = 2;
        $foodItemEleven->price = 12.00;
        $foodItemEleven->description = $faker->realText(50);
        $foodItemEleven->ingredients = "Paccheri, cozze, gamberetti, vongole, peperoncino piccante";
        $foodItemEleven->img_url = asset("img/paccheri-allo-scoglio.jpg");
        $foodItemEleven->is_visible = true;
        $foodItemEleven->save();

        $foodItemTwelve = new FoodItem();
        $foodItemTwelve->name = "Bucatini all'amatriciana";
        $foodItemTwelve->user_id = 6;
        $foodItemTwelve->course_id = 2;
        $foodItemTwelve->price = 10.00;
        $foodItemTwelve->description = $faker->realText(50);
        $foodItemTwelve->ingredients = "Bucatini, guanciale, pecorino, pomodoro, peperoncino";
        $foodItemTwelve->img_url = asset("img/paccheri-allo-scoglio.jpg");
        $foodItemTwelve->is_visible = true;
        $foodItemTwelve->save();

        $foodItemThirteen = new FoodItem();
        $foodItemThirteen->name = "Carbonara";
        $foodItemThirteen->user_id = 7;
        $foodItemThirteen->course_id = 2;
        $foodItemThirteen->price = 12.00;
        $foodItemThirteen->description = $faker->realText(50);
        $foodItemThirteen->ingredients = "Bucatini, guanciale, pecorino, peperoncino";
        $foodItemThirteen->img_url = asset("img/carbonara.jpg");
        $foodItemThirteen->is_visible = true;
        $foodItemThirteen->save();

        $foodItemFourteen = new FoodItem();
        $foodItemFourteen->name = "Trancio di salmone con patate e pachino";
        $foodItemFourteen->user_id = 7;
        $foodItemFourteen->course_id = 3;
        $foodItemFourteen->price = 16.00;
        $foodItemFourteen->description = $faker->realText(50);
        $foodItemFourteen->ingredients = "Salmone, patate, pomodori pachino";
        $foodItemFourteen->img_url = asset("img/salmone-patate.jpg");
        $foodItemFourteen->is_visible = true;
        $foodItemFourteen->save();

        $foodItemFifteen = new FoodItem();
        $foodItemFifteen->name = "Polpette al sugo di mamma con patate al forno";
        $foodItemFifteen->user_id = 8;
        $foodItemFifteen->course_id = 3;
        $foodItemFifteen->price = 15.00;
        $foodItemFifteen->description = $faker->realText(50);
        $foodItemFifteen->ingredients = "Carne bovina, patate, pomodori";
        $foodItemFifteen->img_url = asset("img/polpette-patate.jpg");
        $foodItemFifteen->is_visible = true;
        $foodItemFifteen->save();

        $foodItemSixteen = new FoodItem();
        $foodItemSixteen->name = "Straccetti di manzo con patate";
        $foodItemSixteen->user_id = 8;
        $foodItemSixteen->course_id = 3;
        $foodItemSixteen->price = 16.50;
        $foodItemSixteen->description = $faker->realText(50);
        $foodItemSixteen->ingredients = "Carne bovina, patate";
        $foodItemSixteen->img_url = asset("img/straccetti-manzo.jpg");
        $foodItemSixteen->is_visible = true;
        $foodItemSixteen->save();

        $foodItemSeventeen = new FoodItem();
        $foodItemSeventeen->name = "Spaghetti alla carbonara";
        $foodItemSeventeen->user_id = 9;
        $foodItemSeventeen->course_id = 2;
        $foodItemSeventeen->price = 8.50;
        $foodItemSeventeen->description = $faker->realText(50);
        $foodItemSeventeen->ingredients = "Spaghetti, guanciale, uova";
        $foodItemSeventeen->img_url = asset("img/carbonara-rosamunde.JPG");
        $foodItemSeventeen->is_visible = true;
        $foodItemSeventeen->save();

        $foodItemEighteen = new FoodItem();
        $foodItemEighteen->name = "Parmigiana alle melanzane";
        $foodItemEighteen->user_id = 9;
        $foodItemEighteen->course_id = 3;
        $foodItemEighteen->price = 8.50;
        $foodItemEighteen->description = $faker->realText(50);
        $foodItemEighteen->ingredients = "Melenzane, pomodori, cipolla";
        $foodItemEighteen->img_url = asset("img/parmigiana-di-melanzane-2.jpg");
        $foodItemEighteen->is_visible = true;
        $foodItemEighteen->save();

        $foodItemNineteen = new FoodItem();
        $foodItemNineteen->name = "Pollo fritto paprika e origano con mayolime";
        $foodItemNineteen->user_id = 10;
        $foodItemNineteen->course_id = 3;
        $foodItemNineteen->price = 9.00;
        $foodItemNineteen->description = $faker->realText(50);
        $foodItemNineteen->ingredients = "Pollo, maionese, paprika, origano";
        $foodItemNineteen->img_url = asset("img/pollo-paprika-maio.jpg");
        $foodItemNineteen->is_visible = true;
        $foodItemNineteen->save();

        $foodItemTwenty = new FoodItem();
        $foodItemTwenty->name = "Curry di gamberi e latte di cocco al lime";
        $foodItemTwenty->user_id = 10;
        $foodItemTwenty->course_id = 3;
        $foodItemTwenty->price = 15.00;
        $foodItemTwenty->description = $faker->realText(50);
        $foodItemTwenty->ingredients = "Gamberi, latte di cocco, lime";
        $foodItemTwenty->img_url = asset("img/curry-gamberi.jpg");
        $foodItemTwenty->is_visible = true;
        $foodItemTwenty->save();
        
    }
}
