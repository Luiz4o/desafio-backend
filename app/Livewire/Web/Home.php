<?php

namespace App\Livewire\Web;

use Livewire\Component;
use App\Models\Film;


class Home extends Component
{
    public function render()
    {
        $filmes = Film::all();

        return view('livewire.web.home', ['filmes' => $filmes]);
    }
}
