<x-app-layout>

    <h1 class="text-center heading mt-4">{{ __('Buy any two and get Exciting Offer on cash and card !!!!')}}</h1>
    <a href="{{ route('homepage') }}" class="bg-blue-500 hover:bg-blue-700 font-bold py-2 px-4 rounded" style="border: 1px solid black">Home</a>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h2>Filter Products</h2>
                    <form method="POST" action="{{ route('filterProduct') }}">
                        @csrf
                        <select name="filterCategory" id="filterCategory">
                            <option name="select-category">Select Product Category</option>
                            @foreach($categoryData as $key => $category)
                            <option value="{{ $key }}" {{ ($categoryFilter == $key ? 'selected' : '') }}>{{ $category }}</option>
                            @endforeach
                        </select>
                        <select name="filterTag" id="filterTag">
                            <option name="select-tag">Select Tag</option>
                            @foreach($tagData as $key => $tag)
                            <option value="{{ $tag }}" {{ ($tagFilter == $tag ? 'selected' : '') }}>{{ ucfirst($tag) }}</option>
                            @endforeach
                        </select>
                        <select name="filterPrice" id="filterPrice">
                            <option name="select-price">Select Price</option>
                            <option value="0-10000" {{ ($priceFilter == '0-10000' ? 'selected' : '') }}>0 - 10000</option>
                            <option value="10001-20000" {{ ($priceFilter == '10001-20000' ? 'selected' : '') }}>10001 - 20000</option>
                            <option value="20001-30000" {{ ($priceFilter == '20001-30000' ? 'selected' : '') }}>20001 - 30000</option>
                            <option value="30001-40000" {{ ($priceFilter == '30001-40000' ? 'selected' : '') }}>30001 - 40000</option>
                            <option value="40001-50000" {{ ($priceFilter == '40001-50000' ? 'selected' : '') }}>40001 - 50000</option>
                            <option value="50001-60000" {{ ($priceFilter == '50001-60000' ? 'selected' : '') }}>50001 - 60000</option>
                            <option value="60001-100000" {{ ($priceFilter == '60001-100000' ? 'selected' : '') }}>60001 - infinity</option>
                        </select>
                        <button class="bg-blue-500 hover:bg-blue-700 font-bold py-2 px-4 rounded" type="submit" style="border: 1px solid black">Filter</button>
                    </form>
                </div>
                <div class="p-6 text-gray-900 grid grid-cols-3 gap-4">
                    @foreach($productsData as $key => $product)
                    <div class="col-md-4">
                        <!-- <img class="product-image" src="images/<?= $product['image']; ?>" alt="<?= $product['name']; ?>"> -->
                        <h2 class="text-center">{{ $product['name'] }}</h2>
                        <p class="text-center">{{ $product['description'] }} <br></p>
                        <p class="text-center">{{ '₹ ' . $product['price'] . ' only' }}</p>
                        <button class="bg-blue-500 hover:bg-blue-700 font-bold py-2 px-4 rounded" type="submit" style="border: 1px solid black">Add to Cart</button>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>