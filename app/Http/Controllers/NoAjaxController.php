<?php

namespace App\Http\Controllers;

use App\Http\Requests\NoAjaxCityFormRequest;
use App\Http\Requests\NoAjaxSaveCityFormRequest;
use App\Models\CityWeather;
use App\Services\WeatherApiService;
use App\Services\WeatherDBService;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class NoAjaxController extends Controller
{

    public function index()
    {
        return view('no-ajax.index');
    }

    public function api_show(Request $request)
    {
        return view('no-ajax.api')->with($request->only('city'));
    }

    public function api_store(NoAjaxCityFormRequest $request)
    {
        $validated = $request->validate(['city' => ['required', 'string']]);
        $city = $validated['city'];
        $records = WeatherApiService::getCityWeather($city);
        $first = Arr::first($records);
        $last = Arr::last($records);
        return view('no-ajax.api', compact('city', 'records', 'first', 'last'));
    }

    public function db_show(Request $request)
    {
        if ($city = $request->get('city')) {
            $record = WeatherDBService::getCityWeather($city);
            $records = $record ? [$record] : [];
            return view('no-ajax.db', compact('city', 'record', 'records'));
        }
        return view('no-ajax.db');
    }

    public function db_store(NoAjaxCityFormRequest $request)
    {
        $city = $request->validated('city');
        $record = WeatherDBService::getCityWeather($city);
        $records = $record ? [$record] : [];
        return view('no-ajax.db', compact('city', 'record', 'records'));
    }

    public function save_city(NoAjaxSaveCityFormRequest $request)
    {
        $cityWeather = CityWeather::updateOrCreate([
            'city_name' => $request->validated('city'),
        ], [
            'timestamp_dt' => $request->validated('timestamp'),
            'min_tmp' => $request->validated('minTemp'),
            'max_tmp' => $request->validated('maxTemp'),
            'wind_spd' => $request->validated('windSpeed'),
        ]);
        $cityWeather->touch();

        return redirect()->route('no-ajax.db', ['city' => $cityWeather->city_name]);
    }


}
