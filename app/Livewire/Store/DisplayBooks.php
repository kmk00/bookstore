<?php

namespace App\Livewire\Store;

use App\Livewire\Book\BookInfo;
use App\Models\Book;
use Livewire\Component;
use Livewire\WithPagination;

class DisplayBooks extends Component
{
    use WithPagination;

    public function addToCart($id){
        $object = new BookInfo();
        $object->addToCart($id);
        $this->dispatch('cart-changed');
    }

    public function render()
    {
        $books = Book::paginate(24);
        return view('livewire.store.display-books',[
            'books' => $books
        ]);
    }
}
