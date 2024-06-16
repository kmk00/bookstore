<?php

namespace App\Livewire\Cart;

use App\Models\Book;
use Livewire\Component;

class CartItem extends Component
{

    public $cartItem;


    public function incrementQuantity(){

        $this->cartItem->quantity = $this->cartItem->quantity + 1;
        $this->cartItem->save();
    }

    public function decrementQuantity(){
        $this->cartItem->quantity = $this->cartItem->quantity - 1;

        if($this->cartItem->quantity < 1){
            $this->cartItem->delete();
            return redirect()->route('cart');
        }

        $this->cartItem->save();
    }

    public function removeItem(){
        $this->cartItem->delete();
        return redirect()->route('cart');
    }


    public function render()
    {
        return view('livewire.cart.cart-item');
    }

}
