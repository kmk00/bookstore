<div class="flex flex-wrap gap-2 max-w-80">
    @foreach ($genres as $genre)
        <button wire:click="selectTag('{{ $genre }}')"
            class="bg-gray-200 cursor-pointer rounded-full px-3 py-1 text-xs font-semibold text-gray-700 hover:scale-105 hover:bg-gray-300 transition duration-200 ease-in">
            {{ $genre }}</button>
    @endforeach


</div>
