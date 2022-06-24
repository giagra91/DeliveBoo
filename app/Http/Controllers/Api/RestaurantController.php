<?php

namespace App\Http\Controllers\Api;

use App\User;
use App\Models\FoodItem;
use App\Models\CookingType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use FakerRestaurant\Provider\ar_SA\Restaurant;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = User::with(["cookingTypes", "foodItems"])->get();
        return response()->json($users);
    }

    /**
     * Display a listing of restaurants filtered by categories.
     *
     * @return \Illuminate\Http\Response
     */
    public function filterRestaurants($ids)
    {

        if (!is_array($ids)) {
            $ids = explode(',', $ids);
        }

        $filteredRestaurants = User::whereHas('cookingTypes', function($q) use($ids) {
            $q->whereIn('cooking_type_id', $ids);
        })->get();

        return response()->json($filteredRestaurants);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $foodItems = FoodItem::whereHas('user', function($q) use($id) {
            $q->where('user_id', $id)->with(['user']);
        })->get();

        return response()->json([
                'success' => true,
                'results' => $foodItems,
        ]);
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
