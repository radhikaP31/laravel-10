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
                <table class="table-auto w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">No.</th>
                            <th scope="col" class="px-6 py-3">Product Name</th>
                            <th scope="col" class="px-6 py-3">Quantity</th>
                            <th scope="col" class="px-6 py-3">Total</th>
                            <th scope="col" class="px-6 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-900">
                        @foreach($cartData as $key => $product)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-6 py-4">{{ $key+1; }}</td>
                            <td class="px-6 py-4">{{ $product->product['name'] }}</td>
                            <td class="px-6 py-4"><input type="number" step="1" min="1" max="{{$product['quantity']}}" name="quantity" value="{{$product['quantity']}}" title="Qty" class="input-text qty text mt-3" size="4" pattern="" inputmode="" style="width: 40%;height: 0%;" data-product_id="{{$product['id']}}" data-qty="{{$product['quantity']}}"></td>
                            <td class="px-6 py-4">{{ $product['quantity'] * $product['price'] }}</td>
                            <td class="px-6 py-4">Update | Delete</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>