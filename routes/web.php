<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Livewire\Volt\Volt;

// Volt::route('/app-page', 'volt-todo')->name('home');
// Volt::route('/', 'livewire.pages.home-page');
Route::get('/', function () {
    return view('app-portfolio');
    // return Inertia::render('welcome');
})->name('home');

// Route::get('/volt', fn() => view('volt-counter'));
// Volt::route('volt', 'volt-counter')->name('volt-counter');


require __DIR__ . '/settings.php';
require __DIR__ . '/auth.php';
require __DIR__ . '/dashboard.php';
