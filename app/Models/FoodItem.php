<?php

namespace App\Models;

use App\User;
use App\Models\Order;
use App\Models\Course;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class FoodItem extends Model
{

    protected $fillable = array(
        "name", 
        "price", 
        "description", 
        "ingredients", 
        "is_visible", 
        "course_id", 
    );

    public function course(){
        return $this->hasOne("App\Models\Course");
        
    }

    public function categories(){
        return $this->belongsToMany("App\Models\Category");
        
    }

    public function orders(){
        return $this->belongsToMany("App\Models\Order");        
    }

    public function user(){
        return $this->belongsTo("App\User");        
    }
}
