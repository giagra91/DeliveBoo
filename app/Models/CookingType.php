<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class CookingType extends Model
{
    public function users(){
        return $this->belongsToMany("App\Models\User");
        
    }
}
