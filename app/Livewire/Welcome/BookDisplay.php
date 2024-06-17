<?php

namespace App\Livewire\Welcome;

use App\Livewire\Book\BookInfo;
use App\Models\Book;
use Livewire\Component;


class BookDisplay extends Component
{

    public $books = [];


    public function addToCart($id){
        $object = new BookInfo();
        $object->addToCart($id);
        $this->dispatch('cart-changed');
    }

    public function mount()
    {
        $this->books = Book::inRandomOrder()->take(8)->get(); 
    }


    public function setCategory($category){
        
        if ($category == 'all') {
            $this->books = Book::inRandomOrder()->take(8)->get();
        }

        if ($category == 'new') {
            //Get the latest books
            $this->books = Book::take(8)->latest()->get();
        }

    }

    
    public function render()
    {
        return view('livewire.welcome.book-display');
    }
}
