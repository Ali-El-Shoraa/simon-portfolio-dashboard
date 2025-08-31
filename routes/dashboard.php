<?php

use App\Http\Controllers\Pages\HeroSections;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::middleware(['auth', 'verified'])->group(function () {


    Route::get('/dashboard', function () {
        return Inertia::render('dashboard');
    })->name('dashboard');

    Route::get('/dashboard/hero-section', [HeroSections::class, 'index'])->name('dashboard.hero-section.index');
    Route::post('dashboard/hero-section', [HeroSections::class, 'store'])->name('dashboard.hero-section.store');
    Route::put('dashboard/hero-section/{id}', [HeroSections::class, 'update'])->name('dashboard.hero-section.update');
    Route::delete('dashboard/hero-section/{id}', [HeroSections::class, 'destroy'])->name('dashboard.hero-section.destroy');
});
