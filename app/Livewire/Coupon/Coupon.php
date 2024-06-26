<?php

namespace App\Livewire\Coupon;

use App\Models\Coupon as ModelsCoupon;
use App\Models\CouponUsage;
use Livewire\Component;

class Coupon extends Component
{
    public $couponCode;

    public function applyCoupon()
    {  
        $coupon = ModelsCoupon::where('code', $this->couponCode)->first();
        
        if (!$coupon) {
            session()->flash('error', 'Coupon not found');
            return;
        }

        $userId = auth()->user()->id;
        $hasBeenUsed = CouponUsage::where('user_id', $userId)->where('coupon_id', $coupon['id'])->exists();

        if ($hasBeenUsed) {
            session()->flash('error', 'Coupon has already been used');
            return;
        }
        
        $this->dispatch('coupon-applied', $coupon);
    }

    public function render()
    {
        return view('livewire.coupon.coupon');
    }
}
