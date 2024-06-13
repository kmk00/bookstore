<div class="mt-20 max-w-5xl font-bold mx-auto">
    <form class="border-black border-2 w-full">
        <div class="p-2">
            <input wire:model.live.debounce.300ms="search" class="border-none h-14 text-center w-full" type="text"
                name="search" id="search" placeholder="Search for your favorite books">
        </div>
    </form>


    <div wire:loading class="p-2 w-full bg-white border-2 border-black  hover:bg-slate-100">Loading...</div>
    <div wire:loading.remove class="relative z-50 border-black shadow-md">
        <div class="absolute bg-transparent w-full">


            @if ($search)
                @if (count($books) > 0)
                    @foreach ($books as $book)
                        @include('components.book-search-result', ['book' => $book])
                    @endforeach
                @else
                    <div class="p-2 bg-white border-2  border-black">
                        <p>
                            No book has been found
                        </p>
                    </div>
                @endif
            @endif

        </div>
    </div>
</div>
