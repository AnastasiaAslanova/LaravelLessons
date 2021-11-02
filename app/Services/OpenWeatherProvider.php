<?php

namespace App\Services;

use Illuminate\Config\Repository;
use Illuminate\Http\Client\Factory;

class OpenWeatherProvider implements WeatherProvider
{

    private Factory $http;
    private Repository $config;

    public function __construct(Factory $http, Repository $config)
    {
        $this->http = $http;
        $this->config = $config;
    }

    public function fetchWeatherForCity(string $city): array
    {
        $weatherConf = $this->config->get('weather');
        $params = [
            'appid' => $weatherConf['api_key'],
            'q' => $city,
            'units' => 'metric'
        ];
        $query = http_build_query($params);
        $response = $this->http->get("https://api.openweathermap.org/data/2.5/weather?$query");
        return $response->status() == 200 ? $response->json() : [];

    }

}
