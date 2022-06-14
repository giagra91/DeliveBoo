<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class CookingType extends Model
{

    public $timestamps = false;
    
    public function users(){
        return $this->belongsToMany("App\Models\User");
        
    }
}
