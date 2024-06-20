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
    
    <div class="max-w-[2000px] mx-auto flex flex-wrap">
        <livewire:store.search-filter />
        <livewire:store.display-books />
        
    </div>
</body>

</html>
