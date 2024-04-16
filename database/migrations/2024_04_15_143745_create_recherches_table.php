<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecherchesTable extends Migration
{
    public function up()
    {
        Schema::create('recherches', function (Blueprint $table) {
            $table->id();
            $table->string('city');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('recherches');
    }
}

