<?php

namespace App\Http\Controllers\Admin;

use App\Models\FoodItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
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
        $foods = FoodItem::where("user_id", Auth::user()->id)->get();
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
        $courses = Course::all();
        return view("admin.foods.create", compact('categories', 'courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|max:50',
            'price' => 'required|numeric|max:999',
            'description' => 'required',
            'ingredients' => 'required',
            'is_visible' => 'required|boolean',
            'course_id' => 'required',
        ]);

        $data = $request->all();

        $newFoodItem = new FoodItem();

        $newFoodItem->fill($data);

        $newFoodItem->user_id = Auth::user()->id;

        $newFoodItem->img_url = Storage::put('uploads', $data['img_url']);

        $newFoodItem->save();

        $newFoodItem->categories()->attach($data['category']);

        return redirect()->route("admin.foods.index")->with('message', 'Piatto inserito correttamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  FoodItem $foodItem
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $foodItem = FoodItem::findOrFail($id);
        return view('admin.foods.show', compact('foodItem'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  FoodItem $foodItem
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $foodItem = FoodItem::findOrFail($id);
        $courses = Course::all();
        $categories = Category::all();

        return view("admin.foods.edit", compact('categories', 'courses', 'foodItem'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  FoodItem $foodItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FoodItem $food)
    {

        $request->validate([
            'name' => 'required|max:50',
            'price' => 'required|numeric|max:999',
            'description' => 'required',
            'ingredients' => 'required',
            'is_visible' => 'required|boolean',
            'course_id' => 'required',
        ]);

        $data = $request->all();

        // $foodItem->fill($data);

        $food->user_id = Auth::user()->id;

        $food->img_url = Storage::put('uploads', $data['img_url']);

        $food->categories()->sync($data['category']);

        $food->update($data);      

        return redirect()->route("admin.foods.index")->with('message', 'Piatto modificato correttamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  FoodItem $food
     * @return \Illuminate\Http\Response
     */
    public function destroy(FoodItem $food)
    {
        $food->delete();
        return redirect()->route("admin.foods.index")->with('message', 'Piatto cancellato correttamente');
    }
}
