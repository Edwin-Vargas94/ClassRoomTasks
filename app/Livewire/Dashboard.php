<?php

namespace App\Livewire;

use Livewire\Component;


class Dashboard extends Component
{
    public function render()
    //EGVG 05/04/25: funcion que retornla vista del dashboard del usario logeado.
    {
        return view('livewire.dashboard');
    }
}
