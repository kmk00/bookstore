<?php

namespace App\Livewire\Cart;

use App\Models\Cart as ShoppingCart;
use Livewire\Attributes\On;
use Livewire\Component;

class Cart extends Component
{

    public $cartItems = [];
    public $totalPrice;
    

    #[On('cart-item-updated')]
    public function render()
    {

        $userId = auth()->user()->id;
        $userCart = ShoppingCart::where('user_id', $userId)->get();

        if($userCart){
            $this->cartItems = ShoppingCart::with('cart_items')->with('cart_items.book')->find($userCart[0]->id)->cart_items;
            $this->totalPrice = $this->cartItems->sum('totalPrice');
        }

        
        return view('livewire.cart.cart', [
            'cartItems' => $this->cartItems,
        ]);
    }
}
