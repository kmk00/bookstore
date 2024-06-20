<main class="flex-grow-[999] bg-blue-300 basis-4/6 p-2">
    <div class="grid grid-cols-[repeat(auto-fit,minmax(300px,1fr))] gap-4 p-2">
        @foreach ($books as $book)
            <div class="flex flex-col justify-between">

                <a target="_blank" href="{{ route('book', $book->id) }}">
                    <img src="{{ $book->image ? asset('storage/' . $book->image) : asset('images/book-cover-placeholder.png') }}"
                        alt="Book">

                    <div class="w-fit">
                        <p class="font-bold">
                            {{ $book->title }}
                        </p>

                        <p>
                            {{ $book->authors }}
                        </p>

                        <p class="font-bold">
                            ${{ $book->price }}
                        </p>
                    </div>
                </a>
                <div>
                    <button
                        class="bg-gray-300 hover:bg-primary/20 shadow-md shadow-black/20 transition duration-100 ease-in text-black font-bold py-2 px-4 rounded">
                        Read more</button>
                    @if ($book->quantityAvailable > 1)
                        <button :disabled="{{ $book->quantityAvailable < 1 }}" x-data="{ clicked: false }"
                            @click="clicked = true" :class="{ 'bg-green-500': clicked, 'bg-primary': !clicked }"
                            class="w-fit disabled:bg-gray-300 hover:bg-primary/80 shadow-md shadow-black/20 transition duration-100 ease-in text-white font-bold py-2 px-4 rounded"
                            wire:click="addToCart({{ $book->id }})">
                            <p>Add to cart</p>
                        </button>
                    @endif
                </div>
            </div>
        @endforeach
    </div>

    {{ $books->links() }}

</main>
