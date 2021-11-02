<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/currency', function () {
   return  Http::get ('https://api.privatbank.ua/p24api/pubinfo?json&exchange&coursid=5');
});

Route::get('/weather_in_kiev', [\App\Http\Controllers\Weather::class, 'indexAction']);
Route::get('/weather_in_city', [\App\Http\Controllers\Weather::class, 'weatherForCityAction']);
Route::view('/weather_select_city','weather.select_city');
