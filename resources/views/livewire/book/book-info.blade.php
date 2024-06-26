<div class="">
    @if ($book)
        <div class="max-w-xl mx-auto">
            <div class="flex">
                <div>
                    <img src="{{ $book->image ? asset('storage/' . $book->image) : asset('images/book-cover-placeholder.png') }}"
                        alt="Book">
                </div>
                <div class="flex flex-col justify-center gap-4 ml-4">
                    <div class="text-3xl font-bold">{{ $book->title }}</div>
                    <div class="font-bold">$ {{ $book->price }}</div>
                    <div class="text-gray-500">{{ $book->authors }}</div>
                    <div class="flex">
                        @foreach (explode(',', $book->genres) as $genre)
                            <div
                                class="bg-gray-200 cursor-pointer rounded-full px-3 py-1 text-xs font-semibold text-gray-700 hover:scale-105 hover:bg-gray-300 transition duration-200 ease-in  mr-2">
                                {{ $genre }}
                            </div>
                        @endforeach
                    </div>
                    @if ($book->quantityAvailable > 0)
                        <button
                            wire:loading.attr="disabled"
                            wire:click="addToCart()"
                            class="disabled:bg-gray-300 bg-primary hover:bg-primary/80 shadow-md shadow-black/20 transition duration-100 ease-in text-white font-bold py-2 px-4 rounded">
                            Add to cart
                        </button>
                    @else
                        <p class="text-gray-500">No more books in stock.</p>
                    @endif

                </div>
            </div>
            <div class="my-4 h-px bg-gray-200"></div>
            <div class="flex justify-around p-3 text-center">
                <div>
                    <p class="font-bold">{{ $book->language }}</p>
                    <p class="text-gray-500">Language</p>
                </div>
                <div>
                    <p class="font-bold">{{ $book->created }}</p>
                    <p class="text-gray-500">Published</p>
                </div>
                <div>
                    <p class="font-bold">{{ $book->pages }}</p>
                    <p class="text-gray-500">Pages</p>
                </div>
            </div>
            <div class="my-4">
                <h2>Description</h2>
                <p class="text-gray-500">{{ $book->description }}</p>
                <div class="my-4 h-px bg-gray-200"></div>
                
                <div class="flex justify-between">
                    <div>
                        <p class="">{{ $book->created_at }} </p>
                        <p class="text-gray-500">Offer created</p>
                    </div>
                    <div class="text-right">
                        <p class="">{{ $book->publisher }} </p>
                        <p class="text-gray-500">Publisher</p>
                    </div>
                </div>
            </div>
        </div>
        @else
            <p>No book has been found</p>
        @endif

        @if(session()->has('message'))
            <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 2000)" class="bg-green-500 text-white p-2 fixed bottom-5 inset-x-0 max-w-3xl mx-auto text-center font-bold shadow-md shadow-black/70 rounded">{{ session('message') }}</div>
        @endif
    </div>