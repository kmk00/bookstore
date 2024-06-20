<main class="flex-grow-[999] basis-4/6 p-2">
    <h2 class="md:block hidden py-4 text-2xl">Search for your favorite books</h2>

    <div class="grid grid-cols-[repeat(auto-fit,minmax(200px,1fr))] xl:grid-cols-[repeat(auto-fit,minmax(250px,1fr))] gap-4 p-2">
        @foreach ($books as $book)
            <div class="flex flex-col hover:scale-105 transition duration-100 ease-in h-full shadow-md p-2 justify-between">
                <a target="_blank" href="{{ route('book', $book->id) }}">
                    <img src="{{ $book->image ? asset('storage/' . $book->image) : asset('images/book-cover-placeholder.png') }}" alt="Book">
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
                @if ($book->quantityAvailable > 1)
                    <button x-data="{ clicked: false }" @click="clicked = true" :class="{ 'bg-green-500': clicked, 'bg-primary': !clicked }" class="w-fit mt-2 bg-primary active:bg-green-500 shadow-md shadow-black/20 transition duration-100 ease-in text-white font-bold py-2 px-4 rounded" wire:click="addToCart({{ $book->id }})">
                        <p>Add to cart</p>
                    </button>
                @endif
            </div>
        @endforeach
    </div>
    {{ $books->links() }}
</main>
