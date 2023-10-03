<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public $tagFilter, $categoryFilter, $priceFilter;
    /**
     * get All Products Data
     *
     * @return array
     */
    public function getProducts()
    {
        $productsData = $this->getProductData();
        list($tagData, $categoryData) = $this->getFilterDetails();

        return view('home', compact('productsData', 'tagData', 'categoryData'));
    }

    /**
     * filter product data
     * 
     * @param $data
     */
    public function getFilteredProducts(Request $request)
    {
        $this->categoryFilter = $request->filterCategory;
        $this->tagFilter = $request->filterTag;
        $this->priceFilter = $request->filterPrice;
        $productsData = Products::where('status', 'Active')
                        ->with('productCategory')
                        ->when($this->categoryFilter, function($query) {
                            $query->whereRelation('productCategory', 'id', 'like', $this->categoryFilter);
                        })
                        ->when($this->tagFilter, function($query) {
                            $query->where('tag', 'like', '%' . $this->tagFilter . '%');
                        })
                        ->when($this->priceFilter, function ($query) {
                            $query->where('price', '<>', $this->priceFilter);
                        })
                        ->get();
        list($tagData, $categoryData) = $this->getFilterDetails();
        $oldFormData = $request->old();

        return view('home', compact('productsData', 'tagData', 'categoryData', 'categoryFilter', 'tagFilter', 'priceFilter'));
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
    
}
