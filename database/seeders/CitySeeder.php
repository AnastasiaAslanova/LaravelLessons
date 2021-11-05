<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert([
            ['city' => 'Kiev', 'created_at' => date('Y-m-d H:i:s')],
            ['city' => 'Mariupol', 'created_at' =>  date('Y-m-d H:i:s')],
            ['city' => 'Odessa', 'created_at' => date('Y-m-d H:i:s')],
            ['city' => 'Lviv', 'created_at' => date('Y-m-d H:i:s')],
            ['city' => 'Donetsk', 'created_at' => date('Y-m-d H:i:s')],
        ]);
    }
}
