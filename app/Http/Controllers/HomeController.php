<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public $totalQuantity;

    /**
     * get All Products Data
     *
     * @return array
     */
    public function getProducts(Request $request)
    {
        $filterCategory = $request->filterCategory;
        $filterTag = $request->filterTag;
        $filterPrice = $request->filterPrice;
        $productsData = Products::where('status', 'Active')
            ->with('productCategory')
            ->when($filterCategory, function ($query, $filterCategory) {
                $query->whereRelation('productCategory', 'id', 'like', $filterCategory);
            })
            ->when($filterTag, function ($query, $filterTag) {
                $query->where('tag', 'like', '%' . $filterTag . '%');
            })
            ->when($filterPrice, function ($query, $filterPrice) {
                $query->where('price', '<>', $filterPrice);
            })
            ->get();
        list($tagData, $categoryData) = $this->getFilterDetails();
        $request->flashOnly(['filterCategory', 'filterTag', 'filterPrice']);

        return view('home', compact('productsData', 'tagData', 'categoryData'));
    }

    /**
     * get Products data
     */
    private function getProductData()
    {
        $productsData = Products::where('status', 'Active')->with('productCategory')->get();

        return $productsData;
    }

    /**
     *  get filter details
     */
    private function getFilterDetails()
    {
        $productsData = $this->getProductData();
        $tagData = $categoryName = [];
        foreach ($productsData as $key => $product) {
            $tags = explode(',', $product['tag']);
            $tagData = array_unique(array_merge(array_filter($tags), $tagData));
            $categoryName[$product['productCategory']['id']] = $product['productCategory']['name'];
        }

        return [$tagData, $categoryName];
    }
    
    /**
     * add product to cart
     */
    public function addToCart(Request $request)
    {
        $productId = $request->productId;
        $quantity = $request->quantity;
        $price = $request->price;
        $this->totalQuantity = $request->totalQuantity;
        $userId = Auth::user()->id;
        $validator = Validator::make($request->post(), [
            'quantity' => [
                'required',
                'numeric',
                function ($attribute, $value, $fail) {
                    if ($value > $this->totalQuantity) {
                        $fail("The :attribute must be between less than total quantity!!");
                    }
                }
            ],
        ]);
        if ($validator->fails()) {
            $validator->errors()->add('productId', $productId);
            return redirect('home')
                ->withErrors($validator)
                ->withInput();
        }

        // update product quantity
        $productData = Products::find($productId);
        $productData->quantity = $productData->quantity - $quantity;
        $productData->save();

        // add data in cart table
        if($cartItem = Cart::where('user_id', $userId)->where('product_id', $productId)->first()) {
            $cartItem->update([
                'quantity' => $quantity + $cartItem['quantity'],
            ]);
        } else {
            Cart::create([
                'product_id' => $productId,
                'quantity' => $quantity,
                'price' => $price,
                'user_id' => $userId,
            ]);
        }

        Log::build([
            'driver' => 'single',
            'path' => storage_path('logs/order.log'),
        ])->info($request->productName . ' added to cart by : "' . Auth::user()->name . '" (user id: ' . $userId . ')');
        
        session()->flash('message', 'Product added to cart successfully!!');

        return redirect('home');
    }

    /**
     * get User wise cart data
     */
    public function getUserCartData()
    {
        $userId = Auth::user()->id;

        $cartData = Cart::with('product')->where('user_id',$userId)->get();

        return view('cart', compact('cartData'));

    }
}
