<div class="p-4 border-gray-300 shadow-md shadow-black/20 border-2">
    <div class="flex items-center">
        <div class="w-12">
            <img src="{{ $cartItem->book->image ? asset('storage/' . $cartItem->book->image) : asset('images/book-cover-placeholder.png') }}"
                alt="Book">
        </div>

        <div class="ml-4 w-full flex items-center justify-between">
            <div>

                <p class="font-bold">
                    {{ $cartItem->book->title }}
                </p>
                <p>
                    {{ $cartItem->book->authors }}
                </p>

                <p class="font-bold">
                    ${{ $cartItem->book->price }}
                </p>
            </div>

            {{-- Buttons --}}
            <div class="flex items-center gap-2 md:gap-8">
                <div class="flex md:gap-2 items-center">
                    
                    <button class="text-xl w-8 text-center md:p-2">+</button>
                    <p>{{ $cartItem->quantity }}</p>
                    <button class="text-xl w-8 text-center md:p-2">-</button>
                </div>

                <p class="font-bold">
                    ${{ $cartItem->book->price }}
                </p>

                <button class="text-red-500">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div>
