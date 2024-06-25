<?php

namespace App\Livewire\Store;

use Livewire\Attributes\Url;
use Livewire\Attributes\Validate;
use Livewire\Component;

class SearchFilter extends Component
{

    public $priceMin;
    public $priceMax;
    public $language = '';
    public $dateFrom = '';
    public $dateTo = '';
    public $publisher = '';

    public function filter(){
        $this->validate($this->rules());

        $this->dispatch('filter-changed', $this->priceMin, $this->priceMax, $this->language, $this->dateFrom, $this->dateTo, $this->publisher);
    }

    protected function rules()
    {
        return [
            'priceMin' => ['nullable', 'numeric', 'min:0', 'max:1000000'],
            'priceMax' => ['nullable', 'numeric', 'min:0', 'max:1000000'],
            'language' => ['nullable', 'string'],
            'dateFrom' => ['nullable', 'date'],
            'dateTo' => ['nullable', 'date'],
            'publisher' => ['nullable', 'string'],
        ];
    }

    public function render()
    {
        return view('livewire.store.search-filter');
    }
}
