<?php

namespace App\Services;

use App\Models\CityWeather;
use Illuminate\Support\Facades\Http;

class WeatherApiService
{

    public static function getCityWeather(string $cityName): array
    {
        $response = Http::get(config('openweathermap.base_url'), [
            'q' => $cityName,
            'units' => config('openweathermap.units'),
            'appid' => config('openweathermap.app_id'),
        ]);

        if ($response->successful()) {
            $weatherData = $response->json();
            if (
                isset($weatherData['cod'])
                && (int) $weatherData['cod'] === 200
                && isset($weatherData['city']['name'])
                && isset($weatherData['list'])
                && is_array($weatherData['list'])
            ) {
                $list = [];
                foreach ($weatherData['list'] as $item) {
                    if (isset($item['wind']['speed']) && isset($item['dt'])) {
                        $list[] = new CityWeather([
                            'city_name' => $weatherData['city']['name'],
                            'min_tmp' => $item['main']['temp_min'],
                            'max_tmp' => $item['main']['temp_max'],
                            'wind_spd' => $item['wind']['speed'],
                            'timestamp_dt' => $item['dt'],
                        ]);
                    }
                }
                return $list;
            }
        }
        return [];
    }

}