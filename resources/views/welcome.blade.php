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
        <img class="absolute top-0 w-full z-0" src="{{ asset('images/bg-wave.svg') }}" alt="" srcset="">
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
        <div class="flex justify-center mt-20 max-w-5xl mx-auto">
            <form class="border-black border-2 w-full" action="">
                <div class="flex items-center p-2">
                    <input class="border-none h-14 text-center w-full" type="text" name="search" id="search"
                        placeholder="Book's name">
                    <button class="px-8 bg-primary h-14  text-white" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>
    <main class="relative z-10 mt-40 max-w-7xl mx-auto p-2">
        <div class="flex justify-between">
            <h2 class="text-3xl ">
                All our books
            </h2>
            <div class="flex gap-2">
                <a href="/">
                    Group 1
                </a>
                <a href="/">
                    Group 1
                </a>
                <a href="/">
                    See all
                </a>
            </div>
        </div>

        <div class="grid grid-cols-[repeat(auto-fit,minmax(300px,1fr))] gap-4 p-2">
            <div>
                <img src="{{ asset('images/book-cover-placeholder.png') }}" alt="Book">

                <div class="w-fit">
                    <p class="font-bold">
                        Book Title
                    </p>

                    <p>
                        Author
                    </p>

                    <p class="font-bold">
                        Price
                    </p>
                </div>
            </div>
            <div>
                <img src="{{ asset('images/book-cover-placeholder.png') }}" alt="Book">

                <div class="w-fit">
                    <p class="font-bold">
                        Book Title
                    </p>

                    <p>
                        Author
                    </p>

                    <p class="font-bold">
                        Price
                    </p>
                </div>
            </div>
            <div>
                <img src="{{ asset('images/book-cover-placeholder.png') }}" alt="Book">

                <div class="w-fit">
                    <p class="font-bold">
                        Book Title
                    </p>

                    <p>
                        Author
                    </p>

                    <p class="font-bold">
                        Price
                    </p>
                </div>
            </div>
            <div>
                <img src="{{ asset('images/book-cover-placeholder.png') }}" alt="Book">

                <div class="w-fit">
                    <p class="font-bold">
                        Book Title
                    </p>

                    <p>
                        Author
                    </p>

                    <p class="font-bold">
                        Price
                    </p>
                </div>
            </div>
            <div>
                <img src="{{ asset('images/book-cover-placeholder.png') }}" alt="Book">

                <div class="w-fit">
                    <p class="font-bold">
                        Book Title
                    </p>

                    <p>
                        Author
                    </p>

                    <p class="font-bold">
                        Price
                    </p>
                </div>
            </div>
            <div>
                <img src="{{ asset('images/book-cover-placeholder.png') }}" alt="Book">

                <div class="w-fit">
                    <p class="font-bold">
                        Book Title
                    </p>

                    <p>
                        Author
                    </p>

                    <p class="font-bold">
                        Price
                    </p>
                </div>
            </div>
            <div>
                <img src="{{ asset('images/book-cover-placeholder.png') }}" alt="Book">

                <div class="w-fit">
                    <p class="font-bold">
                        Book Title
                    </p>

                    <p>
                        Author
                    </p>

                    <p class="font-bold">
                        Price
                    </p>
                </div>
            </div>
            <div>
                <img src="{{ asset('images/book-cover-placeholder.png') }}" alt="Book">

                <div class="w-fit">
                    <p class="font-bold">
                        Book Title
                    </p>

                    <p>
                        Author
                    </p>

                    <p class="font-bold">
                        Price
                    </p>
                </div>
            </div>
        </div>
    </main>

</body>

</html>
