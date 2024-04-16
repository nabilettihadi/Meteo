<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrevisionsTable extends Migration
{
    public function up()
    {
        Schema::create('previsions', function (Blueprint $table) {
            $table->id();
            $table->string('city');
            $table->float('temperature');
            $table->float('humidity');
            $table->float('wind_speed');
            $table->string('weather_description');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('previsions');
    }
}
