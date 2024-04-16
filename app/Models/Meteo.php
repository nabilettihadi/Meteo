<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meteo extends Model
{
    use HasFactory;

    protected $fillable = [
        'city',
        'latitude',
        'longitude',
        'timezone',
        'temperature',
        'humidity',
        'wind_speed',
        'description',
        'icon',
        'forecast_date',
    ];

    protected $casts = [
        'forecast_date' => 'datetime:Y-m-d',
    ];
}
