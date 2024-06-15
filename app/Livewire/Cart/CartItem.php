<?php

namespace App\Livewire\Cart;

use Livewire\Component;

class CartItem extends Component
{

    public $cartItem;

    public function render()
    {
        return view('livewire.cart.cart-item');
    }
}
