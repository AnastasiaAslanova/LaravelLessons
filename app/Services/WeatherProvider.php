<?php

namespace App\Services;

interface WeatherProvider
{
    const DEFAULT_PRECISION = 1;

    public function fetchWeatherForCity(string $city): array;

}
