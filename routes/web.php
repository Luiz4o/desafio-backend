<?php

use Illuminate\Support\Facades\Route;

Route::get('/', \App\Livewire\Web\Home::class)->name('home');
Route::get('/cadastrar', \App\Livewire\Web\CreateFilm::class)->name('create');
Route::get('/ver/{id}', \App\Livewire\Web\ViewFilm::class)->name('see');
