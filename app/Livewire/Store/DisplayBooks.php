<?php

namespace App\Livewire\Store;

use App\Livewire\Book\BookInfo;
use App\Models\Book;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class DisplayBooks extends Component
{
    use WithPagination;

    #[Url]
    public $tag = '';

    #[On('tag-selected')]
    public function tagUpdated($tag){
        $this->tag = $tag;
    }

    public function addToCart($id){
        $object = new BookInfo();
        $object->addToCart($id);
        $this->dispatch('cart-changed');
    }

    public function render()
    {
        if ($this->tag == 'all') {
            $books = Book::paginate(24);
            return view('livewire.store.display-books',[
                'books' => $books
            ]);
        }

        $books = Book::where('genres', 'like', '%' . $this->tag . '%')->paginate(24);
        return view('livewire.store.display-books',[
            'books' => $books,
            'tag' => $this->tag
        ]);
    }
}
