<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;


class CheckoutController extends Controller
{
    public function checkout()
    {
        // You can pass the cart details to the view if needed
        $cart = session('cart');

        return view('checkout', compact('cart'));
    }

    public function processCheckout(Request $request)
    {
        // Handle the checkout process
        // For example: Validate input, create an order, etc.

        // Clear the cart after checkout
        session()->forget('cart');

        return redirect()->route('home')->with('success', 'Your order has been placed successfully!');
    }

    public function processOrder(Request $request)
    {
        // Validate the request data
        $request->validate([
            'address' => 'required|string|max:255',
        ]);

        // Retrieve the cart from the session
        $cart = Session::get('cart');

        // Here you would typically create an order in the database
        // For example:
        $order = Order::create([
            'address' => $request->address,
            'total' => $this->calculateTotal($cart),
            // other order fields...
        ]);

        // Clear the cart
        Session::forget('cart');

        // Redirect or return a view with a success message
        return redirect()->route('home')->with('success', 'Your order has been placed successfully!');
    }

    private function calculateTotal($cart)
    {
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        return $total;
    }
}


