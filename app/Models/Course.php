<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Models\FoodItems;

class Course extends Model
{
    public function foodItems(){
        return $this->hasMany("Models\FoodItem");
    }
}
