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
        <div class="grid grid-rows-[auto_minmax(100vh,1fr)_auto] ">
            <x-app.navbar/>
            <div>
                <div class="mx-auto max-w-[1024px] w-full ">
                    {{ $slot }}
                </div>
            </div>
            <x-app.footer/>
        </div>
        @livewireScripts
        @fluxScripts
    </body>
</html>
