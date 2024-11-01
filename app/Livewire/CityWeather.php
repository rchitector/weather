<?php

namespace App\Livewire;

use App\Services\WeatherApiService;
use App\Services\WeatherDBService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\Support\Arr;
use Illuminate\View\View;
use Livewire\Component;

class CityWeather extends Component
{
    public $isLocal = false;
    public $city;
    public $records = [];
    public $record;
    public $first;
    public $last;

    protected $rules = [
        'city' => ['required', 'string'],
    ];

    public function fetchFromApi(): void
    {
        $this->validate();
        $this->isLocal = false;
        $this->records = WeatherApiService::getCityWeatherArray($this->city);
        $this->record = null;
        $this->first = Arr::first($this->records);
        $this->last = Arr::last($this->records);
    }

    public function fetchFromDatabase(): void
    {
        $this->validate();
        $this->isLocal = true;
        $this->record = WeatherDBService::getCityWeather($this->city);
        $this->records = $this->record ? [$this->record] : [];
    }

    public function saveFirst()
    {
        $cityWeather = \App\Models\CityWeather::updateOrCreate([
            'city_name' => $this->city,
        ], [
            'timestamp_dt' => $this->first['timestamp_dt'],
            'min_tmp' => $this->first['min_tmp'],
            'max_tmp' => $this->first['max_tmp'],
            'wind_spd' => $this->first['wind_spd'],
        ]);
        $cityWeather->touch();

        $this->record = $cityWeather;
        $this->records = $this->record ? [$this->record] : [];
        $this->isLocal = true;
    }

    public function render(): Application|Factory|\Illuminate\Contracts\View\View|View
    {
        return view('livewire.city-weather');
    }
}
