<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Facades\Http;

class Meteo extends Component
{
    public $current = [];
    public $days = [];

    private $dailyTemp = [];

    public $search = '';
    public $city = '';

    public function mount()
    {
        if(strlen($this->city) == 0)
            $this->geoIp();

        $this->current = $this->fetchApi();
    }

    public function searchByCity()
    {
        if(strlen($this->search) > 2) 
            $this->city = $this->search;
            

        if(strlen($this->search) == 0) 
            $this->city = "Bruxelles";  

        $this->current = $this->fetchApi();
    }

    public function cancel()
    {
        $this->search = "";
        $this->geoIp();
        $this->current = $this->fetchApi();
    }

    private function fetchApi()
    {
        $currentUnformatted = Http::get('api.openweathermap.org/data/2.5/weather', [
            'q' => $this->city,
            'lang' => 'fr',
            'units' => 'metric',
            'appid' => config('services.openweather.key'),
        ])->json();

        if($currentUnformatted['cod'] != 200) 
            return $currentUnformatted;
        
        $daysUnformatted = Http::get('https://api.openweathermap.org/data/2.5/onecall', [
            'lat' => $currentUnformatted['coord']['lat'] ,
            'lon' => $currentUnformatted['coord']['lon'],
            'exclude' => 'current,minutely,hourly,alerts',
            'units' => 'metric',
            'lang' => 'fr',
            'appid' => config('services.openweather.key'),
        ])->json();

        return $this->format($currentUnformatted, $daysUnformatted);
    }

    private function format($current, $days)
    {
        $this->dailyTemp = collect($days['daily'])->map(function ($day, $key){
           return collect($day)->merge([
               'daily_day' => Carbon::now()->addDay($key + 1)->translatedFormat('D'),
               'daily_icon' => 'http://openweathermap.org/img/wn/' . $day['weather'][0]['icon'] . '.png',
               'daily_description' => ucfirst($day['weather'][0]['description']),
               'daily_temp_max' => round($day['temp']['max']) . '°C',
               'daily_temp_min' => round($day['temp']['min']) . '°C',
           ])->only(['daily_day', 'daily_icon', 'daily_description', 'daily_temp_max', 'daily_temp_min']);
        })->take(7);

        $this->days = $this->dailyTemp;

        return collect($current)->merge([            
            'description' => ucfirst($current['weather'][0]['description']),
            'icon' => 'http://openweathermap.org/img/wn/' . $current['weather'][0]['icon'] .'@2x.png',
            'temp' => round($current['main']['temp']) . '°C',
            'humidity' => round($current['main']['humidity']) . '%',
            'feels_like' => round($current['main']['feels_like']) . '°C',
            'city' => $current['name'],
            'country' => $current['sys']['country'],
        ])
        /*->concat($daysTemp)->dump()->all()*/;
    }

    public function render()
    {
        return view('livewire.meteo');
    }

    private function geoIp()
    {
        $ip = $_SERVER['REMOTE_ADDR']; 
        $query = @unserialize(file_get_contents('http://ip-api.com/php/' . $ip));

        if($query && $query['status'] == 'success')
            $this->city = $query['city'];
        else 
            $this->city = "bruxelles";
    }

}
