<?php

namespace App;

use App\Models\Order;
use App\Models\FoodItem;
use App\Models\CookingType;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    
    use Notifiable;

    protected $table = "users";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', "image_url", "address", "logo_url", "vat_number", "cooking_types"
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function orders(){
        return $this->hasMany("App\Models\Order");
    }

    public function cookingTypes(){
        return $this->belongsToMany("App\Models\CookingType");
    }

    public function foodItems(){
        return $this->hasMany("App\Models\FoodItem");
        
    }
}
