<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CityWeather extends Model
{
    use HasFactory;
    protected $fillable = ['city_id', 'temperature','humidity','pressure','wind_speed','created_at'];
    protected $table = 'city_weathers';
    public $timestamps = ['created_at'];
    const UPDATED_AT = null;
}
