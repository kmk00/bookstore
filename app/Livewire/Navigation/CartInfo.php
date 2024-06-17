<?php

namespace App\Livewire\Navigation;

use App\Models\Cart;
use Livewire\Component;

class CartInfo extends Component
{

    public $totalItems;

    public function render()
    {

        $this->totalItems = count(session('cart', []));

        $userId = auth()->user()->id;
        
        //count number of items in cart
        $this->totalItems = Cart::where('user_id', $userId)->with('cart_items')->first()->cart_items->count();
        
        return view('livewire.navigation.cart-info');
    }
}