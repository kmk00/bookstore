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
    public $usedCoupons = [];

    public function clearCart(){

        $userId = auth()->user()->id;
        $cart = ShoppingCart::where('user_id', $userId)->first();

        // Delete cart items
        $cart->cart_items()->delete();

        // Reset total price
        $cart->totalPrice = null;
        $cart->save();

        // Delete used coupons
        $usedCoupons = CouponUsage::where('user_id', auth()->user()->id)->with('coupon')->get();
        foreach ($usedCoupons as $coupon) {
            $coupon->delete();
        }
        
        return redirect()->route('cart');
    }

    #[On('coupon-applied')]
    public function addDiscount($coupon){
        
        if(!$coupon){
            return;
        }

        $cart = ShoppingCart::where('user_id', auth()->user()->id)->first();
        
        if ($coupon['amount_percentage'] !== null) {
            $cart->totalPrice = $cart->totalPrice * (1 - $coupon['amount_percentage'] / 100);
            $cart->save();
        } 
        
        if ($coupon['discount'] !== null) {
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
            $this->usedCoupons = CouponUsage::where('user_id', auth()->user()->id)->with('coupon')->get();



            return view('livewire.cart.cart', [
                'cartItems' => $this->cartItems,
                'usedCoupons' => $this->usedCoupons,
            ]);
        }

        return view('livewire.cart.cart', [
            'cartItems' => $this->cartItems,
            'usedCoupons' => $this->usedCoupons,
        ]);

        
        


    }
}
