<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Pages\Main\Home;
use App\Livewire\Pages\Auth\Login;
use App\Livewire\Pages\Auth\Register;

Route::get('/', Home::class)->name('home');
Route::livewire('/about', 'pages::main.about')->name('about');

Route::get('/login', Login::class)->name('login');
Route::get('/register', Register::class)->name('register');