<?php

namespace App\Console\Commands;

use Exception;
use Illuminate\Config\Repository;
use Illuminate\Console\Command;
use Illuminate\Http\Client\Factory;

class FetchWeather extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'weather:fetch {city}';

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
            'q' => $this->argument('city'),
            'units' => 'metric'
        ];
        $params = http_build_query($params);
        try {
            $response = $http->get("https://api.openweathermap.org/data/2.5/weather?$params");
            $json = $response->json();
            $date = date('d.m.Y H:i:s') . ' UTC';
            $this->info("Погода в городе {$this->argument('city')} ($date):".PHP_EOL."Температура: {$json['main']['temp']} C");
            return Command::SUCCESS;
        } catch (Exception $e) {
            return Command::FAILURE;
        }
    }
}
