<div>
    <div class="flex justify-between">
        <h2 class="text-3xl ">
            Check our offers
        </h2>
        <div class="flex items-center gap-2">
            <button class="hover:underline" wire:click="setCategory('all')">
                Discover
            </button>
            <span class="cursor-default">|</span>
            <button class="hover:underline" wire:click="setCategory('new')">
                New Releases
            </button>
        </div>
    </div>

    <div class="grid grid-cols-[repeat(auto-fit,minmax(300px,1fr))] gap-4 p-2">
        @foreach ($books as $book)
            <div>
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
            </div>
        @endforeach
    </div>
</div>
