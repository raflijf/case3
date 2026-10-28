<?php

namespace App\Livewire\Pages\Main;

use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cookie;

class Home extends Component
{
    public array $quotes = [];

    private function quotes() {
        $default_quotes = [
            'words' => 'No Quotes Today',
            'by' => '-'
        ];

        $this->quotes = Cache::get('anonUserQoute') ?? $default_quotes ;
    }

    public function mount():void {
        $this->quotes();
    }

    public function render()
    {
        return view('livewire.pages.main.home');
    }
}
