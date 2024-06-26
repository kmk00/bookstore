<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public function cart_items()
    {
        return $this->hasMany(CartItem::class);
    }

    public function order_items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
