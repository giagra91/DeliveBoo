<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::namespace('Api') // # aggiunge come prefisso sui controller contenuti nel gruppo Admin come namespace
    ->name('api.')   // § aggiunge come prefisso sui controller contenuti nel gruppo admin come prefisso ai name
    ->group(function(){
        // # inserisco qui le mie rotte riservate agli admin
        // Route::get('/', 'HomeController@index')->name('home');   // | Aggiunta facoltativa ->middleware('password.confirm');
        Route::resource('users', 'RestaurantController');
    });
