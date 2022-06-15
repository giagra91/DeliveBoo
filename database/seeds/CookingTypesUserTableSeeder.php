<?php

use App\User;
use App\Models\CookingType;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class CookingTypesUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $cookingTypesIds = CookingType::pluck('id')->toArray();

        $users = User::all();
        foreach($users as $user){
            $user->cookingTypes()->sync( $faker->randomElements($cookingTypesIds, 3));
        };
    }
}
