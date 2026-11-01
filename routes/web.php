<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Pages\Main\Home;
use App\Livewire\Pages\Main\Profile;
use App\Livewire\Pages\Main\Create;
use App\Livewire\Pages\Main\Update;
use App\Livewire\Pages\Main\Trash;
use App\Livewire\Pages\Main\ReadArticle;
use App\Livewire\Pages\Auth\Login;
use App\Livewire\Pages\Auth\Register;

use App\Models\Article;
use App\Http\Middleware\AuthRequire;
use App\Http\Middleware\EnsureHasAuth;

Route::get('/', Home::class)->name('home');
Route::get('/article/{slug}', ReadArticle::class)->name('read');

Route::middleware([EnsureHasAuth::class])->group(function () {
    Route::get('/login', Login::class)->name('login');
    Route::get('/register', Register::class)->name('register');
});

Route::middleware([AuthRequire::class])->group(function () {
    Route::livewire('/about', 'pages::main.about')->name('about');
    Route::get('/profile', Profile::class)->name('profile');
    Route::get('/create', Create::class)->name('create');
    Route::get('/trash', Trash::class)->name('trash');
    Route::get('/update/{slug}', Update::class)->name('update');

});


Route::get('/test', function () {
    $a = Article::find(10);
    dump($a);
});