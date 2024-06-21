<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased font-sans">
    <header class="bg-gray-100 relative">
        {{-- <img class="absolute top-0 w-full z-0" src="{{ asset('images/bg-wave.svg') }}" alt="" srcset=""> --}}
        <div class="relative z-10 p-2">
            @if (Route::has('login'))
                <livewire:welcome.navigation />
            @endif
        </div>
    </header>
    
    <div class="max-w-[2000px] mx-auto md:flex flex-wrap">
        <div x-data="{ showFilter: true }">
            <div class="flex justify-between items-center p-2">
                <button @click="showFilter = !showFilter" class="text-2xl hover:scale-95 transition duration-100 ease-in-out flex flex-col items-center justify-center my-4 font-bold text-center">
                    <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M3.9 54.9C10.5 40.9 24.5 32 40 32H472c15.5 0 29.5 8.9 36.1 22.9s4.6 30.5-5.2 42.5L320 320.9V448c0 12.1-6.8 23.2-17.7 28.6s-23.8 4.3-33.5-3l-64-48c-8.1-6-12.8-15.5-12.8-25.6V320.9L9 97.3C-.7 85.4-2.8 68.8 3.9 54.9z"/></svg>
                    <p class="text-sm text-center">Find</p>
                </button>
                <h2 class="md:hidden text-2xl">Search for your favorite books</h2>
            </div>
            
            <div x-show="showFilter">
                <livewire:store.search-filter />
                <div class="h-px bg-gray-200 my-2"></div>
                <livewire:store.select-tag />
            </div>
        </div>
        <livewire:store.display-books />
    </div>
</body>

</html>
