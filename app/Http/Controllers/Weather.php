<?php

namespace App\Http\Controllers;

use App\Services\WeatherProvider;
use Illuminate\Http\Request;

class Weather extends Controller
{
    public function indexAction(WeatherProvider $provider){
       $info = $provider->fetchWeatherForCity('Kiev');
       return view('weather.index', ['city' => 'Kiev']+$info);
    }

    public function weatherForCityAction(Request $request, WeatherProvider $provider){
        $city = $request->get('city');
        $info = $provider->fetchWeatherForCity($city);
        return view('weather.index', ['city' => $city]+$info);
    }
}
