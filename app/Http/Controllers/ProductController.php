<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Electronics;

class ProductController extends Controller
{
    public function jewellery(){
        $products = product::all();

        return view('pages.jewellery', compact('products'));
    }


    public function products(){
            $products = Product::all();
            return view('products', compact('products'));
    }

    public function jumkas($id) {
        // Fetch the product by ID
        $product = Product::findOrFail($id);


        // Pass data to the view
        return view('products.jumkas', compact('product'));
    }

    public function necklaces($id) {
        // Fetch the product by ID
        $product = Product::findOrFail($id);

        // Fetch related products (assuming they belong to the same category)
        $relatedProducts = Product::where('category_id', $product->category_id)
                                ->where('id', '!=', $product->id) // Exclude the current product
                                ->get();

        // Pass data to the view
        return view('products.necklaces', compact('product', 'relatedProducts'));
    }

    public function kagans($id) {
        // Fetch the product by ID
        $product = Product::findOrFail($id);



        // Pass data to the view
        return view('products.kagans', compact('product'));
    }

        public function fashion(){
                $products = product::all();

                return view('pages.fashion', compact('products'));
            }
}
