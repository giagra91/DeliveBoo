<?php

namespace App\Models;

use App\User;
use App\Models\FoodItem;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function user(){
        return $this->belongsTo("App\Models\User");
        
    }

    public function foodItems(){
        return $this->belongsToMany("App\Models\FoodItem");
    }
}
