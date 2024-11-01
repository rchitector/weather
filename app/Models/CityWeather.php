<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CityWeather extends Model
{
    protected $table = 'city_weather';

    protected $fillable = [
        'timestamp_dt',
        'city_name',
        'min_tmp',
        'max_tmp',
        'wind_spd',
    ];

    protected $casts = [
        'timestamp_dt' => 'datetime',
        'min_tmp' => 'float',
        'max_tmp' => 'float',
        'wind_spd' => 'float',
    ];
}
