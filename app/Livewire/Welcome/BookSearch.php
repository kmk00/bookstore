<?php

namespace App\Livewire\Welcome;

use App\Models\Book;
use Livewire\Component;

class BookSearch extends Component
{

    public $search = 'se';



    public function render()
    {


        return view('livewire.welcome.book-search', [
            'books' => Book::where('title', 'like', '%' . $this->search . '%')->paginate(6),
        ]);
    }
}
