<div class="flex flex-wrap justify-center gap-2 md:max-w-80">
    <button wire:click="selectTag('all')"
        class="bg-gray-200 cursor-pointer rounded-full px-3 py-1 text-xs font-semibold text-gray-700 hover:scale-105 hover:bg-gray-300 transition duration-200 ease-in">
        all</button>
    @foreach ($genres as $genre)
        <button wire:click="selectTag('{{ $genre }}')"
            class="bg-gray-200 cursor-pointer rounded-full px-3 py-1 text-xs font-semibold text-gray-700 hover:scale-105 hover:bg-gray-300 transition duration-200 ease-in">
            {{ $genre }}</button>
    @endforeach
</div>
