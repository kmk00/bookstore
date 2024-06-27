<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'code',
        'discount',
        'amount_percentage',
        'valid_from',
        'valid_until',
    ];

    public function couponUsage()
    {
        return $this->hasMany(CouponUsage::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
