<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

// quotes
// Schedule::call(function () {
//     $this->comment(Inspiring::quote());
// })->everySecond();

// Update Quotes 
Schedule::call(function () {
    $data = Storage::disk('local')->json('data/quotes.json');
    $quote = $data[array_rand($data)];
    Cache::put('anonUserQoute', $quote,  $seconds = 60 * 60 * 24);
})->dailyAt('14:20');
