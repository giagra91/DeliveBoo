<?php

namespace App\Http\Controllers\Admin;

use App\Models\FoodItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use App\User;
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
        $restaurant = User::where("id", Auth::user()->id)->get();
        $foods = FoodItem::where("user_id", Auth::user()->id)->get();
        return view("admin.foods.index", compact("foods", "restaurant"));
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

        if ($request->hasFile('img')) {
            $newFoodItem->img = Storage::put('uploads', $data['img']);
        };

        $newFoodItem->save();

        if (!empty($data["category"])) {
            $newFoodItem->categories()->attach($data['category']);
        };

        return redirect()->route("admin.foods.index")->with('create-message', 'Piatto inserito correttamente');
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
            // 'categories' => 'required',
            'ingredients' => 'required',
            'is_visible' => 'required|boolean',
            'course_id' => 'required',
        ]);

        $data = $request->all();

        $food->user_id = Auth::user()->id;

        if ($request->hasFile('img')) {
            $food->img = Storage::put('uploads', $data['img']);
        };

        if (!empty($data["category"])) {
            $food->categories()->sync($data['category']);
        };

        $food->update($data);

        return redirect()->route("admin.foods.index")->with('edit-message', 'Piatto modificato correttamente');

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
        return redirect()->route("admin.foods.index")->with('delete-message', 'Piatto cancellato correttamente');
    }
}
