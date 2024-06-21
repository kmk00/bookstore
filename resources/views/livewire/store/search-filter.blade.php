<div aria-label="Filter" class="basis-64 p-2">
    <form class="flex flex-col gap-4">
        
        <p class="font-bold">Price</p>
        <input class="" placeholder="Min price" type="number" name="priceMin" id="priceMin">
        <input class="" placeholder="Max price" type="number" name="priceMax" id="priceMax">

        <p class="font-bold">Language</p>
        <select class="" name="langueage">
            <option value="English">English</option>
            <option value="French">French</option>
            <option value="Spanish">Spanish</option>
        </select>

        <p class="font-bold">Created</p>
        <input class="" type="date" name="dateFrom">
        <input class="" type="date" name="dateTo">

        <p class="font-bold">Publisher</p>
        <select class="" name="publisher">
            <option value="publisher1">publisher1</option>
            <option value="publisher2">publisher2</option>
            <option value="publisher3">publisher3</option>
        </select>

        <div class="mt-4 flex gap-2 mx-auto">
            <button>Reset</button>
            <button type="submit">Filter</button>
        </div>
    </form>
</div>
