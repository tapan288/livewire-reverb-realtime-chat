<?php

use App\Livewire\Chat\Pages\RoomShow;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('rooms/{room:slug}', RoomShow::class)
    ->middleware(['auth'])
    ->name('rooms.show');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';
