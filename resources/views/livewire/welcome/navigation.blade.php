<nav class="flex flex-1 gap-4 mr-4 items-center justify-end">

    <a href="{{ url('/') }}" class="text-black font-semibold">Home</a>
    
    @auth
        <a href="{{ url('/about-us') }}"
            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]">
            Store
        </a>
        <a href="{{ url('/store') }}"
            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]">
            About Us
        </a>
        <a class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]" href="{{ url('/card') }}">
            <img src="{{ asset('images/cart.png') }}" alt="Cart" class="w-6 h-6">
        </a>

        <a href="{{ url('/dashboard') }}"
            class="rounded-md px-5 py-2 bg text-white bg-primary ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]">
            Profile
        </a>
    @else
        <a href="{{ route('login') }}"
            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20">
            Log in
        </a>

        @if (Route::has('register'))
            <a href="{{ route('register') }}"
                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]">
                Register
            </a>
        @endif
    @endauth
</nav>
