<?php

namespace App\Livewire\Cart;

use App\Models\Cart as ShoppingCart;
use App\Models\CouponUsage;
use Livewire\Attributes\On;
use Livewire\Component;

class Cart extends Component
{

    public $cartItems = [];
    public $totalPrice;

    public function clearCart(){

        $userId = auth()->user()->id;
        $cart = ShoppingCart::where('user_id', $userId)->first();

        $cart->cart_items()->delete();
        $cart->totalPrice = null;
        $cart->save();
        
        return redirect()->route('cart');
    }

    #[On('coupon-applied')]
    public function addDiscount($coupon){
        
        if(!$coupon){
            return;
        }

        $cart = ShoppingCart::where('user_id', auth()->user()->id)->first();
        
        if ($coupon['amount_percentage'] !== null) {
            // $this->totalPrice = $this->totalPrice * (1 - $coupon['amount_percentage'] / 100);
            $cart->totalPrice = $cart->totalPrice * (1 - $coupon['amount_percentage'] / 100);
            $cart->save();
        } 
        
        if ($coupon['discount'] !== null) {
            // $this->totalPrice = $this->totalPrice - $coupon['discount'];
            $cart->totalPrice = $cart->totalPrice - $coupon['discount'];
            $cart->save();
        }
        
        $userId = auth()->user()->id;
        
        CouponUsage::create([
            'coupon_id' => $coupon['id'],
            'user_id' => $userId,
        ]);

        session()->flash('coupon-success', 'Coupon applied successfully');
    }
  
    
    #[On('cart-item-updated')]
    public function render()
    {

        $userId = auth()->user()->id;
        $userCart = ShoppingCart::where('user_id', $userId)->get();
        

        if($userCart->count() > 0){
            $this->cartItems = ShoppingCart::with('cart_items')->with('cart_items.book')->find($userCart[0]->id)->cart_items;
            $this->totalPrice = $userCart[0]->totalPrice; 
            return view('livewire.cart.cart', [
                'cartItems' => $this->cartItems,
            ]);
        }

        return view('livewire.cart.cart', [
            'cartItems' => $this->cartItems,
        ]);

        
        


    }
}
