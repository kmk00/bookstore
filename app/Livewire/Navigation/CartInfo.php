<?php

namespace App\Livewire\Navigation;

use App\Models\Cart;
use Livewire\Component;
use Livewire\Attributes\On;

class CartInfo extends Component
{

    public $totalItems;

    #[On('cart-changed')]
    #[On('cart-item-updated')]
    public function render()
    {
        $this->totalItems = count(session('cart', []));

        $userId = auth()->user()->id;
        
        //count number of items in cart
        $cart = Cart::where('user_id', $userId)->first();

        if(!$cart) {
            $this->totalItems = 0;
            return view('livewire.navigation.cart-info');
        }
        
        $this->totalItems = Cart::where('user_id', $userId)->with('cart_items')->first()->cart_items->sum('quantity');
        
        return view('livewire.navigation.cart-info');
    }
}
