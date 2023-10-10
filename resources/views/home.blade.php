<x-app-layout>

    <h1 class="text-center heading mt-4">{{ __('Buy any two and get Exciting Offer on cash and card !!!!')}}</h1>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-4">
                @if (session()->has('message'))
                <div class="p-3 bg-green-300 text-green-700 rounded shadow-sm">
                    {{ session('message')}}
                </div>
                @endif
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h2>Filter Products</h2>
                    <form method="POST" action="{{ route('homepage') }}">
                        @csrf
                        <select name="filterCategory" id="filterCategory">
                            <option value=''>Select Product Category</option>
                            @foreach($categoryData as $key => $category)
                            <option value="{{ $key }}" @selected(old('filterCategory')==$key)>{{ $category }}</option>
                            @endforeach
                        </select>
                        <select name="filterTag" id="filterTag">
                            <option value=''>Select Tag</option>
                            @foreach($tagData as $key => $tag)
                            <option value="{{ $tag }}" @selected(old('filterTag')==$tag)>{{ ucfirst($tag) }}</option>
                            @endforeach
                        </select>
                        <select name="filterPrice" id="filterPrice">
                            <option value=''>Select Price</option>
                            <option value="0-10000" @selected(old('filterPrice')=='0-10000' )>0 - 10000</option>
                            <option value="10001-20000" @selected(old('filterPrice')=='10001-20000' )>10001 - 20000</option>
                            <option value="20001-30000" @selected(old('filterPrice')=='20001-30000' )>20001 - 30000</option>
                            <option value="30001-40000" @selected(old('filterPrice')=='30001-40000' )>30001 - 40000</option>
                            <option value="40001-50000" @selected(old('filterPrice')=='40001-50000' )>40001 - 50000</option>
                            <option value="50001-60000" @selected(old('filterPrice')=='50001-60000' )>50001 - 60000</option>
                            <option value="60001-100000" @selected(old('filterPrice')=='60001-100000' )>60001 - infinity</option>
                        </select>
                        <button class="bg-blue-500 hover:bg-blue-700 font-bold py-2 px-4 rounded text-white" type="submit">Filter</button>
                    </form>
                </div>
                <div class="flex flex-wrap">
                    @foreach($productsData as $key => $product)
                    <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/6 mb-4 shadow rounded mb-3 ml-3 mr-3">
                        <div class="px-6 py-4">
                            <div class="font-bold text-xl mb-2">{{ $product['name'] }}</div>
                            <p class="text-gray-700 text-base">
                                {{ $product['description'] }}
                            </p>
                            <p class="text-gray-700 text-base text-lg text-dark">
                                {{ '₹ ' . $product['price'] . ' only' }}
                            </p>
                            @if ($errors->first('productId') == $product['id'] && $errors->has('quantity'))
                            <span class="text-danger text-left">{{ $errors->first('quantity') }}</span>
                            @endif
                            <form method="POST" action="{{ route('addToCart') }}">
                                @csrf
                                <input type="hidden" name="productId" value="{{$product['id']}}">
                                <input type="hidden" name="productName" value="{{$product['name']}}">
                                <input type="number" step="1" min="1" max="{{$product['quantity']}}" name="quantity" value="1" title="Qty" class="input-text qty text mt-3" size="4" pattern="" inputmode="" style="width: 40%;height: 0%;" data-product_id="{{$product['id']}}" data-qty="{{$product['quantity']}}">
                                <input type="hidden" name="totalQuantity" value="{{$product['quantity']}}">
                                <input type="hidden" name="price" value="{{$product['price']}}">
                                <button class="bg-blue-500 hover:bg-blue-700 text-white border-white font-bold py-2 px-4 rounded mt-4" type="submit" style="border: 1px solid black">Add to Cart</button>
                            </form>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>