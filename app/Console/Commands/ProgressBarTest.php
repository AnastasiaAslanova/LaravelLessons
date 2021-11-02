<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ProgressBarTest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:progress-bar';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test program to learn about Laravel progress bar';

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
        $max = 1000;

        $bar = $this->output->createProgressBar($max);
        $this->output->info('[laravel-app] Starting...');
        $bar->start();

        for ($i = 0; $i < $max; $i++) {
            usleep(12300); // 0.0123 seconds
            $bar->advance();
        }

        $this->output->info('[laravel-app] Woohoo! We have finished our progress!');
    }

}
