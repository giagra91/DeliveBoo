<?php

namespace App\Models;

use App\Models\FoodItem;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function foodItems(){
        return $this->belongsToMany("App\Models\FoodItem");
        
    }
}
