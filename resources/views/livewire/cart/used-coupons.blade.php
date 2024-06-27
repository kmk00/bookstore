<div class="flex flex-col gap-2 mt-4">
    <p class="text-sm font-bold text-right">Used Coupons</p>
    @foreach ($usedCoupons as $coupon)
    <div class="flex flex-row gap-2 items-center">

        <p class="text-gray-400">{{ $coupon->coupon->code }}:</p> @if ($coupon->coupon->amount_percentage)
        <p class="font-bold text-green-600">-{{ $coupon->coupon->amount_percentage }}%</p>
        @else
        <p class="font-bold text-green-600">-{{ $coupon->coupon->discount }}$</p>
        @endif
        
    </div>
    @endforeach
</div>
