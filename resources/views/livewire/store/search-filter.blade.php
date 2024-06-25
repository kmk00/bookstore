<div aria-label="Filter" class="basis-64 p-2">
    <form  @submit.prevent class="flex flex-col gap-4">
        
        <p class="font-bold">Price</p>
        <input wire:model="priceMin" class="" placeholder="Min price" type="number" name="priceMin" id="priceMin">
        @error('priceMin')
            <p class="text-red-500">{{ $message }}</p>
        @enderror
        <input wire:model="priceMax" class="" placeholder="Max price" type="number" name="priceMax" id="priceMax">
        @error('priceMax')
            <p class="text-red-500">{{ $message }}</p>
        @enderror
        <p class="font-bold">Language</p>
        <select wire:model="language" class="" name="language">
            <option value="">-</option>
            @foreach ($languages as $language)
                <option value="{{ $language }}">{{ $language }}</option>
            @endforeach
        </select>

        <p class="font-bold">Created</p>
        <input wire:model="dateFrom" class="" type="date" name="dateFrom">
        <input wire:model="dateTo" class="" type="date" name="dateTo">

        <p class="font-bold">Publisher</p>
        <select wire:model="publisher" class="" name="publisher">
            <option value="">-</option>
            @foreach ($publishers as $publisher)
                <option value="{{ $publisher }}">{{ $publisher }}</option>
            @endforeach
        </select>

        <div class="mt-4 flex gap-2 mx-auto">
            <button wire:click.prevent="resetFilter()" >Reset</button>
            <button wire:click.prevent="filter()">Search</button>
        </div>
    </form>
</div>
