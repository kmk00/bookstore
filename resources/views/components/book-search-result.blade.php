@props(['book'])

<div class="p-2 border-b-2 border-x-2 border-black bg-white hover:bg-slate-100 cursor-pointer">
    <a class="w-full h-full" href="{{ route('book', $book->id) }}">
    <p class="font-bold">
        {{ $book->title }}
    </p>

    <p>
</div>
