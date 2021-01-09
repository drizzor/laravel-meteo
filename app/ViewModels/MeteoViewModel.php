<?php

namespace App\ViewModels;

use Spatie\ViewModels\ViewModel;

class MeteoViewModel extends ViewModel
{

    public $current;

    public function __construct($current)
    {
        $this->current = $current;
    }

    public function current()
    {
        if ($this->current['cod'] !== 200) 
            return collect($this->current);  

        return collect($this->current)->merge([            
            'description' => ucfirst($this->current['weather'][0]['description']),
            'icon' => 'http://openweathermap.org/img/wn/' . $this->current['weather'][0]['icon'] .'@2x.png',
            'temp' => round($this->current['main']['temp']) . '°C',
            'humidity' => round($this->current['main']['humidity']) . '%',
            'feels_like' => round($this->current['main']['feels_like']) . '°C',
            'city' => $this->current['name'],
            'country' => $this->current['sys']['country'],
        ])->dump();
    }
}
