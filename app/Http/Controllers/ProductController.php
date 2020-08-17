<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoryId = request('category_id');
        $categoryName = null;
        // $test = Product::where('id', $categoryId);
        if($categoryId)
        {
            $category = Category::find($categoryId);
            $categoryName = $category->name;

            $categoryProducts = $category->allProducts();
        }
        else
        {
            $categoryProducts = Product::take(10)->get();
        }

        return view('product.index', compact('categoryProducts','categoryName'));
    }

    /**Search the products */
    public function search(Request $request)
    {
        $query = $request->input('query');

        $products = Product::where('name','LIKE',"%$query%")->paginate(5);

        return view('product.catalog', compact('products'));
    }

    public function details($id)
    {
        $productDetails = Product::findOrFail($id);

        return view('product._product_details', compact('productDetails'));
    }
}
