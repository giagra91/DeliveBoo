<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Braintree\Gateway;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::namespace('Api') 
    ->name('api.')   
    ->group(function(){
        // Route::get('/', 'HomeController@index')->name('home');   // | Aggiunta facoltativa ->middleware('password.confirm');
        Route::resource('users', 'RestaurantController');
        Route::get('cooking-types', 'CookingTypesController@cookingTypes');
        
        
    });
    
    // Route::get('/restaurants', 'Api\CookingTypesController@filteredApi');
Route::get('/users/{id}', 'Api\RestaurantController@show');

Route::get('/filtered_restaurants/{ids}', 'Api\RestaurantController@filterRestaurants');

Route::get('orders/token', 'Api\OrdersController@generate'); /* Per generare il token del pagamento */
Route::post('orders/payment', 'Api\OrdersController@makePayment'); /* Per confermare il pagamento */
Route::post('orders/add', 'Api\OrdersController@addOrder');