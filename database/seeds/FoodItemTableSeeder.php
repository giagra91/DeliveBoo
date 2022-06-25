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
        $foodItemOne->description = "La pasta alla carbonara è un piatto caratteristico del Lazio e più in particolare di Roma, preparato con ingredienti popolari e dal gusto intenso.";
        $foodItemOne->ingredients = "fettuccine, carne bovina, passata di pomodoro";
        $foodItemOne->img = "img/carbonara-pasta-in-corso.jpeg";
        $foodItemOne->is_visible = true;
        $foodItemOne->save();

        $foodItemTwo = new FoodItem();
        $foodItemTwo->name = "Lasagna al ragù";
        $foodItemTwo->user_id = 1;
        $foodItemTwo->course_id = 2;
        $foodItemTwo->price = 8.50;
        $foodItemTwo->description = "Le lasagne al ragù sono un grande classico della cucina italiana, un piatto conosciuto in tutto il mondo.";
        $foodItemTwo->ingredients = "spaghetti, uovo, guanciale, pecorino romano, pepe nero";
        $foodItemTwo->img = "img/lasagna-pasta-in-corso.jpeg";
        $foodItemTwo->is_visible = true;
        $foodItemTwo->save();

        $foodItemThree = new FoodItem();
        $foodItemThree->name = "Tonnarello cacio e pepe";
        $foodItemThree->user_id = 2;
        $foodItemThree->course_id = 2;
        $foodItemThree->price = 9.50;
        $foodItemThree->description = "I tonnarelli cacio e pepe sono un piatto tipico della tradizione romana, descrive nella sua natura secoli di tradizioni.";
        $foodItemThree->ingredients = "Acqua, farina, uova e tanto amore! Tutte le nostre paste vengono servite con parmigiano reggiano DOP O Pecorino, secondo tradizione.";
        $foodItemThree->img = "img/tonnarello cacio e pepe.jpeg";
        $foodItemThree->is_visible = true;
        $foodItemThree->save();

        $foodItemFour = new FoodItem();
        $foodItemFour->name = "Saltimbocca alla Romana con purè di patate";
        $foodItemFour->user_id = 2;
        $foodItemFour->course_id = 2;
        $foodItemFour->price = 14.50;
        $foodItemFour->description = "I Saltimbocca alla romana sono un tipico piatto della tradizione capitolina a base di fettine di vitella, prosciutto crudo dolce e salvia";
        $foodItemFour->ingredients = "patate, sugo, carne e tradizione!";
        $foodItemFour->img = "img/saltimbocca-alla-romana.jpeg";
        $foodItemFour->is_visible = true;
        $foodItemFour->save();

        $foodItemFive = new FoodItem();
        $foodItemFive->name = "Crostino di patate, speck, provola e porcini";
        $foodItemFive->user_id = 3;
        $foodItemFive->course_id = 1;
        $foodItemFive->price = 12.00;
        $foodItemFive->description = "La ricetta di questo sformato monoporzione prevede un guscio di patate che racchiude un delizioso cuore di provola, funghi e speck";
        $foodItemFive->ingredients = "patate, provola affumicata, speck, formaggio, funghi porcini";
        $foodItemFive->img = "img/crostini-patate-funghi-speck-11.jpeg";
        $foodItemFive->is_visible = true;
        $foodItemFive->save();

        $foodItemSix = new FoodItem();
        $foodItemSix->name = "Pinsa Mia";
        $foodItemSix->user_id = 3;
        $foodItemSix->course_id = 3;
        $foodItemSix->price = 9.50;
        $foodItemSix->description = "Gustosa focaccia o schiacciatina che viene preparata con farina di riso, frumento, soia e pasta madre (lievito naturale fatto seccare, disidratato), tutti ingredienti ad alta digeribilità.";
        $foodItemSix->ingredients = "salsa tonnata, rughetta, carciofini, arrosto, olive, grana e pomodori secchi";
        $foodItemSix->img = "img/pinsa-mia.jpeg";
        $foodItemSix->is_visible = true;
        $foodItemSix->save();

        $foodItemSeven = new FoodItem();
        $foodItemSeven->name = "Carpaccio";
        $foodItemSeven->user_id = 4;
        $foodItemSeven->course_id = 1;
        $foodItemSeven->price = 16.00;
        $foodItemSeven->description = "Il carpaccio è un piatto freddo a base di sottili fettine di carne cruda di manzo servite con una salsa definita 'universale' a base di maionese.";
        $foodItemSeven->ingredients = "Carpaccio di manzo 'Pezzata Rossa' marinato alle spezie del mediterraneo, con frutti di bosco e aceto balsamico ai lamponi";
        $foodItemSeven->img = "img/carpaccio.jpeg";
        $foodItemSeven->is_visible = true;
        $foodItemSeven->save();

        $foodItemEight = new FoodItem();
        $foodItemEight->name = "Pesce Spada";
        $foodItemEight->user_id = 4;
        $foodItemEight->course_id = 3;
        $foodItemEight->price = 13.00;
        $foodItemEight->description = "Il pesce spada alla piastra, o pesce spada alla griglia, è un secondo piatto leggero e saporito, perfetto per un fresco pranzo estivo da accompagnare a un'insalata colorata o a un contorno di verdure di stagione.";
        $foodItemEight->ingredients = "Pesce spada affumicato su mousse di formaggio fresco all’aneto e cetriolo con pepe rosa";
        $foodItemEight->img = "img/pesce spada.jpeg";
        $foodItemEight->is_visible = true;
        $foodItemEight->save();

        $foodItemNine = new FoodItem();
        $foodItemNine->name = "Tagliatelle Speck, Fiori di Zucca e Zucchine";
        $foodItemNine->user_id = 5;
        $foodItemNine->course_id = 2;
        $foodItemNine->price = 12.00;
        $foodItemNine->description = "Le tagliatelle con fiori di zucca e zucchine gratinate al forno sono un primo piatto perfetto per la stagione autunnale.";
        $foodItemNine->ingredients = "Speck, Fiori di Zucca e Zucchine";
        $foodItemNine->img = "img/tagliatelle-ai-fiori-di-zucca.jpeg";
        $foodItemNine->is_visible = true;
        $foodItemNine->save();

        $foodItemTen = new FoodItem();
        $foodItemTen->name = "Filetto al pepe verde";
        $foodItemTen->user_id = 5;
        $foodItemTen->course_id = 2;
        $foodItemTen->price = 18.00;
        $foodItemTen->description = "Questo pregiato taglio di manzo, di prima qualità, viene servito con una salsa avvolgente aromatizzata con grani di pepe verde, che dona cremosità e rotondità al piatto.";
        $foodItemTen->ingredients = "Filetto, pepe verde";
        $foodItemTen->img = "img/Filetto-al-pepe-verde-e-senape.jpeg";
        $foodItemTen->is_visible = true;
        $foodItemTen->save();

        $foodItemEleven = new FoodItem();
        $foodItemEleven->name = "Paccheri allo scoglio";
        $foodItemEleven->user_id = 6;
        $foodItemEleven->course_id = 2;
        $foodItemEleven->price = 12.00;
        $foodItemEleven->description = "I paccheri allo scoglio sono un piatto che viene preparato utilizzando un condimento a base di frutti di mare, calamari e gamberi, che, insieme ai pomodorini, creano un sughetto molto prelibato, con cui amalgamare i paccheri.";
        $foodItemEleven->ingredients = "Paccheri, cozze, gamberetti, vongole, peperoncino piccante";
        $foodItemEleven->img = "img/paccheri-allo-scoglio.jpg";
        $foodItemEleven->is_visible = true;
        $foodItemEleven->save();

        $foodItemTwelve = new FoodItem();
        $foodItemTwelve->name = "Bucatini all'amatriciana";
        $foodItemTwelve->user_id = 6;
        $foodItemTwelve->course_id = 2;
        $foodItemTwelve->price = 10.00;
        $foodItemTwelve->description = "I bucatini all'amatriciana sono un primo piatto a base di pasta lunga bucata, i bucatini appunto e sugo di pomodoro preparato con pomodoro e guanciale, tipico del Lazio. ";
        $foodItemTwelve->ingredients = "Bucatini, guanciale, pecorino, pomodoro, peperoncino";
        $foodItemTwelve->img = "img/paccheri-allo-scoglio.jpg";
        $foodItemTwelve->is_visible = true;
        $foodItemTwelve->save();

        $foodItemThirteen = new FoodItem();
        $foodItemThirteen->name = "Carbonara";
        $foodItemThirteen->user_id = 7;
        $foodItemThirteen->course_id = 2;
        $foodItemThirteen->price = 12.00;
        $foodItemThirteen->description = "La carbonara è un primo piatto tipico della tradizione romana preparato con un condimento a base di uova, guanciale e pecorino romano.";
        $foodItemThirteen->ingredients = "Bucatini, guanciale, pecorino, peperoncino";
        $foodItemThirteen->img = "img/carbonara.jpg";
        $foodItemThirteen->is_visible = true;
        $foodItemThirteen->save();

        $foodItemFourteen = new FoodItem();
        $foodItemFourteen->name = "Trancio di salmone con patate e pachino";
        $foodItemFourteen->user_id = 7;
        $foodItemFourteen->course_id = 3;
        $foodItemFourteen->price = 16.00;
        $foodItemFourteen->description = "Il trancio di salmone con pomodori e timo è un ottimo secondo piatto di mare elegante e leggero. Il timo e i pomodori che vengono fatti saltare in padella per insaporire le carni conferiscono al salmone con pomodori e timo un sapore mediterraneo.";
        $foodItemFourteen->ingredients = "Salmone, patate, pomodori pachino";
        $foodItemFourteen->img = "img/salmone-patate.jpg";
        $foodItemFourteen->is_visible = true;
        $foodItemFourteen->save();

        $foodItemFifteen = new FoodItem();
        $foodItemFifteen->name = "Polpette al sugo di mamma con patate al forno";
        $foodItemFifteen->user_id = 8;
        $foodItemFifteen->course_id = 3;
        $foodItemFifteen->price = 15.00;
        $foodItemFifteen->description = "Le polpette al sugo con patate sono un secondo piatto o un piatto unico, davvero saporito e gustoso.Le polpette vengono cotte in un gustoso sugo di pomodoro, arricchito da patate.";
        $foodItemFifteen->ingredients = "Carne bovina, patate, pomodori";
        $foodItemFifteen->img = "img/polpette-patate.jpg";
        $foodItemFifteen->is_visible = true;
        $foodItemFifteen->save();

        $foodItemSixteen = new FoodItem();
        $foodItemSixteen->name = "Straccetti di manzo con patate";
        $foodItemSixteen->user_id = 8;
        $foodItemSixteen->course_id = 3;
        $foodItemSixteen->price = 16.50;
        $foodItemSixteen->description = " Sono straccetti di manzo teneri, succosi e accompagnati da morbide patate in umido.";
        $foodItemSixteen->ingredients = "Carne bovina, patate";
        $foodItemSixteen->img = "img/straccetti-manzo.jpg";
        $foodItemSixteen->is_visible = true;
        $foodItemSixteen->save();

        $foodItemSeventeen = new FoodItem();
        $foodItemSeventeen->name = "Spaghetti alla carbonara";
        $foodItemSeventeen->user_id = 9;
        $foodItemSeventeen->course_id = 2;
        $foodItemSeventeen->price = 8.50;
        $foodItemSeventeen->description = "La carbonara è un primo piatto tipico della tradizione romana preparato con un condimento a base di uova, guanciale e pecorino romano.";
        $foodItemSeventeen->ingredients = "Spaghetti, guanciale, uova";
        $foodItemSeventeen->img = "img/carbonara-rosamunde.JPG";
        $foodItemSeventeen->is_visible = true;
        $foodItemSeventeen->save();

        $foodItemEighteen = new FoodItem();
        $foodItemEighteen->name = "Parmigiana alle melanzane";
        $foodItemEighteen->user_id = 9;
        $foodItemEighteen->course_id = 3;
        $foodItemEighteen->price = 8.50;
        $foodItemEighteen->description = "Pochi ingredienti come pomodoro, melanzane, basilico e formaggio, tanto sapore per un piatto simbolo della cucina mediterranea!";
        $foodItemEighteen->ingredients = "Melenzane, pomodori, cipolla";
        $foodItemEighteen->img = "img/parmigiana-di-melanzane-2.jpg";
        $foodItemEighteen->is_visible = true;
        $foodItemEighteen->save();

        $foodItemNineteen = new FoodItem();
        $foodItemNineteen->name = "Pollo fritto paprika e origano con mayolime";
        $foodItemNineteen->user_id = 10;
        $foodItemNineteen->course_id = 3;
        $foodItemNineteen->price = 9.00;
        $foodItemNineteen->description = "Piccoli bastoncini di pollo croccanti e gustosi, la paprika dona un gusto particolare e con mayolime, fanstastici!";
        $foodItemNineteen->ingredients = "Pollo, maionese, paprika, origano";
        $foodItemNineteen->img = "img/pollo-paprika-maio.jpg";
        $foodItemNineteen->is_visible = true;
        $foodItemNineteen->save();

        $foodItemTwenty = new FoodItem();
        $foodItemTwenty->name = "Curry di gamberi e latte di cocco al lime";
        $foodItemTwenty->user_id = 10;
        $foodItemTwenty->course_id = 3;
        $foodItemTwenty->price = 15.00;
        $foodItemTwenty->description = " I gamberi al curry e latte di cocco sono un piatto esotico e dal sapore inconfondibile.";
        $foodItemTwenty->ingredients = "Gamberi, latte di cocco, lime";
        $foodItemTwenty->img = "img/curry-gamberi.jpg";
        $foodItemTwenty->is_visible = true;
        $foodItemTwenty->save();
        
    }
}
