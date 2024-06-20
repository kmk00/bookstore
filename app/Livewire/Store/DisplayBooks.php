<?php

namespace App\Livewire\Store;

use App\Models\Book;
use Livewire\Component;
use Livewire\WithPagination;

class DisplayBooks extends Component
{
    use WithPagination;

    public function render()
    {
        $books = Book::inRandomOrder()->paginate(6);
        return view('livewire.store.display-books',[
            'books' => $books
        ]);
    }
}
