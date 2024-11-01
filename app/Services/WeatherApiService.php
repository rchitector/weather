<?php

namespace App\Services;

use App\Models\CityWeather;
use Carbon\Carbon;
use GuzzleHttp\Promise\PromiseInterface;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class WeatherApiService
{

    private static function getResponse(string $cityName): PromiseInterface|Response
    {
        return Http::get(config('openweathermap.base_url'), [
            'q' => $cityName,
            'units' => config('openweathermap.units'),
            'appid' => config('openweathermap.app_id'),
        ]);
    }

    private static function isDataValid($weatherData): bool
    {
        if (
            isset($weatherData['cod'])
            && (int) $weatherData['cod'] === 200
            && isset($weatherData['city']['name'])
            && isset($weatherData['list'])
            && is_array($weatherData['list'])
        ) {
            return true;
        }
        return false;
    }


    private static function getModel($weatherData, $item): CityWeather
    {
        return new CityWeather([
            'city_name' => $weatherData['city']['name'],
            'min_tmp' => $item['main']['temp_min'],
            'max_tmp' => $item['main']['temp_max'],
            'wind_spd' => $item['wind']['speed'],
            'timestamp_dt' => $item['dt'],
        ]);
    }

    private static function getDataArray($weatherData, $item): array
    {
        return [
            'city_name' => $weatherData['city']['name'],
            'min_tmp' => $item['main']['temp_min'],
            'max_tmp' => $item['main']['temp_max'],
            'wind_spd' => $item['wind']['speed'],
            'timestamp_dt' => Carbon::createFromTimestamp($item['dt']),
        ];
    }

    private static function getWeatherData($cityName, $returnModel = false): array
    {
        $response = WeatherApiService::getResponse($cityName);
        if ($response->successful()) {
            $weatherData = $response->json();
            if (WeatherApiService::isDataValid($weatherData)) {
                $list = [];
                foreach ($weatherData['list'] as $item) {
                    if (isset($item['wind']['speed']) && isset($item['dt'])) {
                        if ($returnModel) {
                            $list[] = WeatherApiService::getModel($weatherData, $item);
                        } else {
                            $list[] = WeatherApiService::getDataArray($weatherData, $item);
                        }
                    }
                }
                return $list;
            }
        }
        return [];
    }

    public static function getCityWeatherArray(string $cityName): array
    {
        return self::getWeatherData($cityName);
    }

    public static function getCityWeather(string $cityName): array
    {
        return self::getWeatherData($cityName, true);
    }

}