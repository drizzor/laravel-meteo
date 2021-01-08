<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Meteo extends Component
{
    public $location;

    public function render()
    {
        return view('livewire.meteo');
    }
}
