@props(['book'])

<div class="p-2 border-b-2 border-x-2 border-black bg-white hover:bg-slate-100 cursor-pointer">
    <p class="font-bold">
        {{ $book->title }}
    </p>
</div>
