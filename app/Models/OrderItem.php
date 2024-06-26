<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    public function orders(){
        return $this->belongsTo(Order::class);
    }

    public function books(){
        return $this->belongsTo(Book::class);
    }

}
