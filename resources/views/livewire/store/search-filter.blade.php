<div aria-label="Filter" class="bg-red-200 grow basis-64 p-2">
    <div class="flex justify-between">
        <p>Filter</p>
    </div>
    <form class="flex flex-col gap-4">
        <p>Price</p>
        <input class="" placeholder="Min price" type="number" name="priceMin" id="priceMin">


        <input class="" placeholder="Max price" type="number" name="priceMax" id="priceMax">

        <p>Language</p>
        <select class="" name="langueage">
            <option value="English">English</option>
            <option value="French">French</option>
            <option value="Spanish">Spanish</option>
        </select>

        <p>Created</p>
        <input class="" type="date" name="dateFrom">
        <input class="" type="date" name="dateTo">

        <p>Publisher</p>
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
