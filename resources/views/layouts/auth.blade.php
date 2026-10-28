<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'Literacy' }}</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        @livewireStyles
        @fluxAppearance
    </head>
    <body>
        <div class="grid grid-rows-[auto_minmax(100vh,1fr)_auto]">
            <div class="h-10">
                <div class="w-full fixed flex items-center h-15 px-10">
                    <flux:brand href="/" wire:navigate logo="{{ asset('images/logo.jpg') }}" name="Literacy" class="" />
                    <flux:spacer/>
                    <div class="flex items-center  gap-4">
                        <flux:button x-data x-on:click="$flux.dark = ! $flux.dark" variant="subtle" icon:trailing="moon" size="sm" class="r"></flux:button>                
                        <flux:button onclick="window.history.back()" size="sm" icon="arrow-left">Kembali</flux:button>
                    </div>
                </div>
            </div>
            <div class="mx-auto max-w-xl w-full grid place-items-center">
                {{ $slot }}
            </div>
            <x-app.footer/>            
        </div>
        @livewireScripts
        @fluxScripts
    </body>
</html>
