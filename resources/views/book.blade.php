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

    <main class="mb-20 max-w-7xl mx-auto p-2">

        @livewire('book.book-info', ['id' => $id], key($id))

    </main>

</body>

</html>
