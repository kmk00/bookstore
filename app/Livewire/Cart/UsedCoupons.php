<?php

namespace App\Livewire\Cart;

use Livewire\Component;

class UsedCoupons extends Component
{

    public $usedCoupons;

    public function render()
    {
        return view('livewire.cart.used-coupons');
    }
}
