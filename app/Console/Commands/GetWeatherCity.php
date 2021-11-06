<?php

namespace App\Console\Commands;

use Illuminate\Config\Repository;
use Illuminate\Console\Command;
use Illuminate\Http\Client\Factory;
use App\Repositories\CityRepository;

class GetWeatherCity extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'weather:FromDB {city}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Display city weather from database';

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
    public function handle()
    {
        $city = $this->argument('city');
        $cityModel = CityRepository::getCityWithWeatherHistory($city);
        if ($cityModel === null){
            dd("weather for $city was not found");
        }
        dd($cityModel->weatherHistory->toArray());


    }

}
