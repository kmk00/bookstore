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

    public $tag;

    public $priceMin;
    public $priceMax;
    public $language;
    public $dateFrom;
    public $dateTo;
    public $publisher;

    #[On('tag-selected')]
    public function tagUpdated($tag){
        $this->tag = $tag;
    }

    #[On('filter-changed')]
    public function filter($priceMin, $priceMax, $language, $dateFrom, $dateTo, $publisher){
        $this->priceMin = $priceMin;
        $this->priceMax = $priceMax;
        $this->language = $language;
        $this->dateFrom = $dateFrom;
        $this->dateTo = $dateTo;
        $this->publisher = $publisher;
    }

    public function addToCart($id){
        $object = new BookInfo();
        $object->addToCart($id);
        $this->dispatch('cart-changed');
    }

    private function searchQuery(){
        $query = Book::query();

        
        if ($this->tag !== 'all') {
            $query->where('genres', 'like', '%' . $this->tag . '%');
        }

        if ($this->priceMin) {
            $query->where('price', '>=', $this->priceMin);
        }

        if ($this->priceMax) {
            $query->where('price', '<=', $this->priceMax);
        }

        if ($this->language) {
            $query->where('language', $this->language);
        }

        if ($this->dateFrom) {
            $query->where('created', '>=', $this->dateFrom);
        }

        if ($this->dateTo) {
            $query->where('created', '<=', $this->dateTo);
        }

        if ($this->publisher) {
            $query->where('publisher', $this->publisher);
        }

        // dump($query->toSql(),$this->priceMin, $this->priceMax, $this->language, $this->dateFrom, $this->dateTo, $this->publisher);

        return $query->paginate(24);
    }

    public function render()
    {

        $books = $this->searchQuery();


        return view('livewire.store.display-books',[
            'books' => $books,
            'tag' => $this->tag
        ]);
    }
}
