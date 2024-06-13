<?php

namespace App\Livewire\Book;

use App\Models\Book;
use Livewire\Attributes\Url;
use Livewire\Component;

class BookInfo extends Component
{
    

    public $id;



    public function render()
    {


        return view('livewire.book.book-info',[
            'book' => Book::find($this->id),
        ]);
    }
}
