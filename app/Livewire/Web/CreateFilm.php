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
        'summary' => 'required|min:5',
        'cover' => 'required|image|max:1024'
    ];

    public function store()
    {
        $this->validate();

        $coverPath = $this->cover->store('covers', 'public');

        $film = Film::create([
            'title' => $this->title,
            'summary' => $this->summary,
            'cover' => $coverPath,
        ]);

        $this->reset(['title', 'summary','cover']);

        return redirect()->route('see', ['id' =>$film->id]);
    }

    public function messages()
    {
        return [
            'title.required' => 'O título do filme é obrigatório!',
            'title.min' => 'O título deve ter pelo menos 3 caracteres.',
            'summary.required' => 'A descrição não pode estar vazia!',
            'summary.min' => 'A descrição deve ter no mínimo 5 caracteres.',
            'cover.required' => 'A capa do filme é obrigatória!',
            'cover.image' => 'A capa deve ser uma imagem válida (JPEG, PNG, JPG, etc.).',
            'cover.max' => 'A capa não pode ter mais de 1MB.'
        ];
    }

    public function render()
    {
        return view('livewire.web.create-film');
    }
}
