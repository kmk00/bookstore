<?php

namespace App\Livewire\Coupon;

use App\Models\Coupon as ModelsCoupon;
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
        
        $this->dispatch('coupon-applied', $coupon);
    }

    public function render()
    {
        return view('livewire.coupon.coupon');
    }
}
