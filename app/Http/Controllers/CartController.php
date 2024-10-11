<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Clothes;
use App\Models\Electronics;
use Illuminate\Http\Request;

class CartController extends Controller
{
    // Add product to cart
    public function addToCart($id)
    {
        // Try to find the product in the three models
        $product = Product::find($id);
        $clothes = Clothes::find($id);
        $electronics = Electronics::find($id);

        // If the product is found in the Product model
        if ($product) {
            $cart = session()->get('cart', []);

            // Check if the product is already in the cart
            if (isset($cart[$id])) {
                $cart[$id]['quantity']++;
            } else {
                $cart[$id] = [
                    "name" => $product->name,
                    "quantity" => 1,
                    "price" => $product->price,
                    "description" => $product->description
                ];
            }

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Product added to cart!');
        }

        // If the clothes item is found
        if ($clothes) {
            $cart = session()->get('cart', []);

            if (isset($cart[$id])) {
                $cart[$id]['quantity']++;
            } else {
                $cart[$id] = [
                    "name" => $clothes->name,
                    "quantity" => 1,
                    "price" => $clothes->price,
                    "description" => $clothes->description
                ];
            }

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Clothes added to cart!');
        }

        // If the electronics item is found
        if ($electronics) {
            $cart = session()->get('cart', []);

            if (isset($cart[$id])) {
                $cart[$id]['quantity']++;
            } else {
                $cart[$id] = [
                    "name" => $electronics->name,
                    "quantity" => 1,
                    "price" => $electronics->price,
                    "description" => $electronics->description
                ];
            }

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Electronics added to cart!');
        }

        // If no products are found, return a 404
        abort(404);
    }

    // Show cart
    public function viewCart()
    {
        $cart = session()->get('cart');
        return view('cart', compact('cart'));
    }

    // Remove item from cart
    public function removeFromCart($id)
    {
        $cart = session()->get('cart');

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Product removed from cart!');
    }

    // Update item quantity in cart
    public function updateCart(Request $request)
    {
        $cart = session()->get('cart');

        if (isset($cart[$request->id])) {
            $cart[$request->id]['quantity'] = $request->quantity; // Assuming `quantity` is passed in the request
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Cart updated successfully!');
    }
}
