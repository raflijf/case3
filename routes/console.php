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
     $data = json_decode(
        file_get_contents(resource_path('data/quotes.json')),
        true
    );
    $quote = $data[array_rand($data)];
    Cache::put('anonUserQoute', $quote,  $seconds = 60 * 60 * 24);
})->dailyAt('00:00');