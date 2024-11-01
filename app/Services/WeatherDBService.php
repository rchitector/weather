<?php

namespace App\Services;

use App\Models\CityWeather;

class WeatherDBService
{

    public static function getCityWeather(?string $cityName): CityWeather|null
    {
        return CityWeather::where('city_name', $cityName)?->first();
    }

}