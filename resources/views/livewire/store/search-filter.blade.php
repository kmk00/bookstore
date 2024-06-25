<div aria-label="Filter" class="basis-64 p-2">
    <form  @submit.prevent class="flex flex-col gap-4">
        
        <p class="font-bold">Price</p>
        <input wire:model="priceMin" class="border-2 border-primary  focus:ring-sky-200 focus:ring rounded-md font-bold" placeholder="Min price" type="number" name="priceMin" id="priceMin">
        @error('priceMin')
            <p class="text-red-500">{{ $message }}</p>
        @enderror
        <input wire:model="priceMax" class="border-2 border-primary  focus:ring-sky-200 focus:ring rounded-md font-bold" placeholder="Max price" type="number" name="priceMax" id="priceMax">
        @error('priceMax')
            <p class="text-red-500">{{ $message }}</p>
        @enderror
        <p class="font-bold">Language</p>
        <select wire:model="language" class="border-2  border-primary focus:ring-sky-200 focus:ring rounded-md font-bold" name="language">
            <option class="placeholder-blue-600 " value="">-</option>
            @foreach ($languages as $language)
                <option value="{{ $language }}">{{ $language }}</option>
            @endforeach
        </select>

        <p class="font-bold">Created</p>
        <input wire:model="dateFrom" class="border-2 border-primary  focus:ring-sky-200 focus:ring rounded-md font-bold" type="date" name="dateFrom">
        <input wire:model="dateTo" class="border-2 border-primary  focus:ring-sky-200 focus:ring rounded-md font-bold" type="date" name="dateTo">

        <p class="font-bold">Publisher</p>
        <select wire:model="publisher" class="border-2 border-primary  focus:ring-sky-200 focus:ring rounded-md font-bold" name="publisher">
            <option value="">-</option>
            @foreach ($publishers as $publisher)
                <option class="placeholder-blue-600 checked:bg-primary" value="{{ $publisher }}">{{ $publisher }}</option>
            @endforeach
        </select>

        <div class="mt-4 font-bold flex gap-2 mx-auto">
            <button class="border-2 border-primary hover:bg-primary/60 hover:text-white transition-all duration-200 rounded-md p-2" wire:click.prevent="resetFilter()" >Reset</button>
            <button class="border border-primary bg-primary text-white hover:bg-primary/80 transition-all duration-200 rounded-md p-2" wire:click.prevent="filter()">Search</button>
        </div>
    </form>
</div>
