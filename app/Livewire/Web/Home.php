<?php

namespace App\Livewire\Web;

use Livewire\Component;
use App\Models\Film;
use Livewire\WithPagination;


class Home extends Component
{

    use WithPagination;

    public function goToPageNumber($pageNumber)
    {
        $this->gotoPage($pageNumber);
    }

    public function mount()
    {
        $this->resetPage();
    }

    public function render()
    {

        $filmes = Film::paginate(10);

        return view('livewire.web.home', ['filmes' => $filmes]);
    }
}
