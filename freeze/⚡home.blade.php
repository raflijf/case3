<?php

use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cookie;

new class extends Component
{

    public array $quotes = [];
    public string $cek = '';

    private function quotes() {
        $data = Storage::disk('local')->json('data/quotes.json');
        if (Cache::has('anonUserQoute')) {
            $this->quotes = Cache::get('anonUserQoute');
            $this->cek = 'ambek';
        } else {
            $quote = $data[array_rand($data)];
            Cache::put('anonUserQoute', $quote, $seconds = 60 * 60 * 24);
            $this->quotes = $quote  ; 
            $this->cek = 'buat';
        }
    }

    public function mount():void {
        $this->quotes();
    }
};
?>

<div>
  <div class="mx-2">
    <p class="text-xl font-semibold mb-5 mt-2">Today's Quotes</p>
    <p class="text-center my-5 font-light text-sm">"{{ $quotes['words'] ?? 'No Quotes' }}" <br/> -- {{ $quotes['by'] }} -- </p>
  </div>
  <flux:separator class="my-5"/>
  <div class="flex flex-col  gap-3 mb-4">
    @for ($i = 1; $i <= 7; $i++) 
        <x-app.card/>
    @endfor
    <div class="">
        <flux:button class="w-full max-w-3xl text-emerald-500 px-3" >Other</flux:button>
    </div>
  </div>
</div>