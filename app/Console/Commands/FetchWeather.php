<?php

namespace App\Console\Commands;

use Exception;
use Illuminate\Config\Repository;
use Illuminate\Console\Command;
use Illuminate\Http\Client\Factory;

class FetchWeather extends Command
{
    private const DEFAULT_PRECISION = 1;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'weather:fetch {cities*}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Display the weather according to the city';
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(Factory $http, Repository $config)
    {
        $weatherConf = $config->get('weather');
        $params = [
            'appid' => $weatherConf['api_key'],
            'q' =>'' ,
            'units' => 'metric'
        ];

        try {
            $dataByCities = [];
            foreach ($this->argument('cities') as $city) {
                $params['q'] = $city;
                $query = http_build_query($params);
                $response = $http->get("https://api.openweathermap.org/data/2.5/weather?$query");
                $info = $response->json();
                $dataByCities[] = compact('city') + $this->normalizeWeatherDetails($info);
            }
            $this->table(['City', 'Temperature, °C','Humidity, %', 'Pressure, mm Hg', 'Wind, m/s'],$dataByCities);
            //$this->info("Погода в городе {$this->argument('city')} ($date):".PHP_EOL."Температура: {$json['main']['temp']} C");
            return Command::SUCCESS;
        } catch (Exception $e) {
            return Command::FAILURE;
        }

    }
    private function normalizeWeatherDetails(array $weatherData): array
    {
        return [
            'temperature' => (int) $weatherData['main']['temp'],
            'humidity' => (int) $weatherData['main']['humidity'],
            'pressure' => (int) $weatherData['main']['pressure'],
            'wind' => round($weatherData['wind']['speed'], self::DEFAULT_PRECISION),
        ];
    }

}
