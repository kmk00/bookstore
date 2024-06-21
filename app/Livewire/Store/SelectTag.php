<?php

namespace App\Livewire\Store;

use App\Models\Book;
use Livewire\Attributes\Url;
use Livewire\Component;

class SelectTag extends Component
{

    // Get all of the genres and display them


    #[Url]
    public $tag = '';

    public function selectTag($tag){
        $this->tag = $tag;
        $this->dispatch('tag-selected', $tag);
    }

    public function render()
    {
        
        $genresFromDatabase = Book::select('genres')->get();
        $genres = [];
        foreach($genresFromDatabase as $genre){
            $genres = array_merge($genres, explode(',', $genre->genres));
        }

        $uniqueGenres = array_unique($genres);        
        


        return view('livewire.store.select-tag', [
            'genres' => $uniqueGenres
        ]);
    }
}
