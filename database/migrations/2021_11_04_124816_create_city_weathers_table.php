<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCityWeathersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('city_weathers', function (Blueprint $table) {
            $table->id();
            $table->integer('city_id');
            $table->string('temperature');
            $table->string('humidity');
            $table->string('pressure');
            $table->string('wind_speed');
            $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('city_weathers');
    }
}
