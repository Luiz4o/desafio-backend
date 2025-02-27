<?php

namespace App\Livewire\Web;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Film;

class CreateFilm extends Component
{
    use WithFileUploads;

    public $title;
    public $summary;
    public $cover;

    protected $rules = [
        'title' => 'required|min:3',
        'summary' => 'nullable|min:5',
        'cover' => 'image|max:1024'
    ];

    public function store()
    {
        $this->validate();

        $coverPath = $this->cover->store('covers', 'public');

        Film::create([
            'title' => $this->title,
            'summary' => $this->summary,
            'cover' => $coverPath,
        ]);

        $this->reset(['title', 'summary','cover']);
    }

    public function render()
    {
        return view('livewire.web.create-film');
    }
}
