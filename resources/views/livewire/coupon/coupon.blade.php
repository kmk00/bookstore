<div class=" py-4">
    <div class="flex gap-4 items-center justify-between">
        <p class="text-sm text-bold">Disount code?</p>
        <form class="flex">
            <div>

                <input type="text" wire:model="couponCode" class="input input-bordered w-full rounded-l-md">
            </div>
            <button wire:click.prevent="applyCoupon"
                class="bg-primary rounded-r-md px-4 text-white py-2 font-bold hover:bg-primary/80 transition duration-100 ease-in">Apply</button>

        </form>

    </div>
    @if (session()->has('error'))
        <p class="text-red-500 text-right">{{ session('error') }}</p>
    @endif
</div>
