<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    // Add product to cart
    public function addToCart($id)
    {
        $product = Product::find($id);

        if (!$product) {
            abort(404);
        }

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
