<?php

namespace App\Http\Controllers\Api;

use App\User;
use App\Models\CookingType;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CookingTypesController extends Controller
{


    /* Display all cooking types
     *
     * @return \Illuminate\Http\Response
     */
    public function cookingTypes()
    {
        $cookingTypes = CookingType::all();
        return response()->json($cookingTypes);
    }

    public function filteredApi(array $data)
    {
        $userInput = $request->input("type");

        // $restaurants = User::whereHas('cookingTypes', function ($q) {
        //     $q->where('name', "pesce");
        // })->get();
        $users = User::all();
        // $categories = CookingType::where("name", $type)::whereHas("users");
        // if ($type != "All") {
        //     $restaurants = User::whereHas('cookingTypes', function ($query) use ($type) {
        //     $query->where('name', $type);
        //     })->get();
        // } else {
        //     $restaurants = User::all();
        // }
        $restaurants = [];
        if(Str::length($data) > 0){

            foreach ($users as $user) {
                foreach ($user->cookingTypes as $cookingType) {
                    if(in_array($data, $cookingType)){
                        array_push($restaurants, $user);
                    }
                }
            }
        }
    
    
        // foreach ($restaurants as $restaurant) {
        //     $types = [];
        //     $types = $restaurant->types;
        //     $restaurant->types = $types;
        // };
    
        // return response()->json($restaurants);
        return response()->json($restaurants);

    }
}
