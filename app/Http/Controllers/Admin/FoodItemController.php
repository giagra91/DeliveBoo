<?php

namespace App\Http\Controllers\Admin;

use App\Models\FoodItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FoodItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $foods = FoodItem::all();
        return view("admin.foods.index", compact("foods"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view("admin.foods.create", compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newFoodItem = new FoodItem();

        $request->validate([
            'name' => 'required|max:50',
            'price' => 'required|numeric|max:999',
            'description' => 'required',
            'ingredients' => 'required',
            'is_visible' => 'required|boolean',
            'course_id' => 'required',
        ]);

        $data = $request->all();

        $data['user_id'] = Auth::user()->id;

        $newFoodItem->fill($data);

        $newFoodItem->categories()->sync($data['category']);

        $newFoodItem->img_url = Storage::put('uploads', $data['image']);

        $newFoodItem->save();

        return redirect()->route("admin/foods");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view("admin.foods.edit");
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
