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
    <div class="relative z-10 mt-20 p-2">
        <div class="flex flex-col text-center max-w-5xl mx-auto">
            <p class="text-xl text-primary">
                Your favorite bookstore
            </p>
            <h1 class="text-5xl font-bold">
                Welcome to our bookstore app
            </h1>
        </div>
        <livewire:welcome.book-search />
    </div>
    <main class="my-20 max-w-7xl mx-auto p-2">
      @livewire('welcome.book-display')
    </main>

</body>

</html>
