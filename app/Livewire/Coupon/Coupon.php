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
            session()->flash('error', 'Coupon is not available');
            return;
        }

        // dd($this->checkIfCouponIsValid($coupon),$coupon->valid_from,$coupon->valid_until);

        if (!$this->checkIfCouponIsValid($coupon)) {
            session()->flash('error', 'Coupon is not valid');
            return;
        }

        $userId = auth()->user()->id;
        $hasBeenUsed = CouponUsage::where('user_id', $userId)
            ->where('coupon_id', $coupon['id'])
            ->exists();

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

    private function checkIfCouponIsValid($coupon)
    {
        // Check if coupon expired
        if ($coupon->valid_until) {
            $couponDateUntil = $coupon->valid_until;
            $couponDateUntil = strtotime($couponDateUntil);
            $currentDate = strtotime(date('Y-m-d'));


            if ($couponDateUntil < $currentDate) {
                dd('expired');
                return false;
            }
        }

        // Check if coupon has valid date
        if ($coupon->valid_from) {
            $couponDateFrom = $coupon->valid_from;
            $couponDateFrom = strtotime($couponDateFrom);
            $currentDate = strtotime(date('Y-m-d'));


            if ($couponDateFrom > $currentDate) {
                dd('not valid');
                return false;
            }
        }


        return true;
    }
}
