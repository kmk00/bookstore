<a class="relative rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]" href="{{ url('/cart') }}">
    <img src="{{ asset('images/cart.png') }}" alt="Cart" class="w-6 h-6">
    <p class="absolute top-0 right-0 bg-primary text-white rounded-full w-5 h-5 text-center">{{ $totalItems }}</p>
</a>
