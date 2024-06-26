<div>
    <div class="h-px my-4 bg-gray-400"></div>

    <div class="flex flex-col gap-2 mt-4">
        @if (count($cartItems) > 0)
            @foreach ($cartItems as $cartItem)
                <livewire:cart.cart-item :key="$cartItem->id" :cartItem="$cartItem" />
            @endforeach
            <div class="flex-col items-end flex gap-2 mt-4">
                <livewire:coupon.coupon />
                <div class="flex items-center justify-end gap-2">
                    <p class="text-3xl font-bold mr-2">Total: {{ $totalPrice }}$</p>
                    <button
                        class="bg-primary hover:bg-primary/80 shadow-md shadow-black/20 transition duration-100 ease-in text-white font-bold py-2 px-4 rounded">
                        Checkout
                    </button>

                    <button wire:click="clearCart()"
                        class="bg-gray-300 hover:bg-primary/20 shadow-md shadow-black/20 transition duration-100 ease-in text-black font-bold py-2 px-4 rounded">
                        Clear Cart
                    </button>
                </div>
            </div>
        @else
            <p>Cart is empty</p>
        @endif
    </div>
</div>
