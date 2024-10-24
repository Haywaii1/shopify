<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Clothes;
use App\Models\Electronics;
use Illuminate\Support\Facades\Session;

class CartComponent extends Component
{
    public $cart = [];

    public function mount()
    {
        $this->cart = Session::get('cart', []);
    }

    // Add product to cart
    public function addToCart($id)
    {
        $product = Product::find($id);
        $clothes = Clothes::find($id);
        $electronics = Electronics::find($id);

        // Check each model for the product
        $item = $product ?? $clothes ?? $electronics;

        if ($item) {
            if (isset($this->cart[$id])) {
                $this->cart[$id]['quantity']++;
            } else {
                $this->cart[$id] = [
                    'name' => $item->name,
                    'quantity' => 1,
                    'price' => $item->price,
                    'description' => $item->description,
                ];
            }

            // Update session
            Session::put('cart', $this->cart);
            session()->flash('success', $item->name . ' added to cart!');
        } else {
            session()->flash('error', 'Item not found!');
        }
    }

    // Remove product from cart
    public function removeFromCart($id)
    {
        if (isset($this->cart[$id])) {
            unset($this->cart[$id]);
            Session::put('cart', $this->cart);
            session()->flash('success', 'Product removed from cart!');
        }
    }

    // Update cart quantity
    public function updateCart($id, $quantity)
    {
        if (isset($this->cart[$id])) {
            $this->cart[$id]['quantity'] = $quantity;
            Session::put('cart', $this->cart);
            session()->flash('success', 'Cart updated successfully!');
        }
    }

    public function render()
    {
        return view('livewire.cart-component', ['cart' => $this->cart]);
    }
}
