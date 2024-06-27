<?php

namespace App\Livewire\Cart;

use App\Models\Book;
use App\Models\Cart;
use Livewire\Component;

class CartItem extends Component
{

    public $cartItem;


    public function incrementQuantity(){

        $cart = Cart::where('user_id', auth()->user()->id)->first();
        $this->cartItem->quantity = $this->cartItem->quantity + 1;
        $this->cartItem->totalPrice = $this->cartItem->price * $this->cartItem->quantity;
        $this->cartItem->save();

        $cart->totalPrice = $cart->cart_items->sum('totalPrice');
        $cart->save();

        $this->dispatch('cart-item-updated');

    }

    public function decrementQuantity(){
        $this->cartItem->quantity = $this->cartItem->quantity - 1;
        $this->cartItem->totalPrice = $this->cartItem->price * $this->cartItem->quantity;

        if($this->cartItem->quantity < 1){
            $this->cartItem->delete();
            return redirect()->route('cart');
        }

        $this->cartItem->save();
        
        $cart = Cart::where('user_id', auth()->user()->id)->first();
        $cart->totalPrice = $cart->cart_items->sum('totalPrice');
        $cart->save();

        $this->dispatch('cart-item-updated');
    }

    public function removeItem(){

        $cart = Cart::where('user_id', auth()->user()->id)->first();
        $priceToRemove = $this->cartItem->price * $this->cartItem->quantity;
        $cart->totalPrice = $cart->totalPrice - $priceToRemove;
        $cart->save();
        $this->cartItem->delete();
        
        return redirect()->route('cart');
    }


    public function render()
    {
        
        return view('livewire.cart.cart-item');
    }

}
