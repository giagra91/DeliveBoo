<?php

use App\Models\CookingType;
use Illuminate\Database\Seeder;

class CookingTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = ["giapponese", "cinese", "indiano", "pesce", "carne", "pizza", 
        "italiano", "messicano", "internazionale", "fusion", "gourmet", "greco"];
        for ($i=0; $i < count($names) ; $i++) { 
            $cookingType = new CookingType;
            $cookingType->name = $names[$i];
            $cookingType->save();
        }
    }
}
