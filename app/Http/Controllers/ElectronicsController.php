<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Electronics; // Ensure you have the correct model
use App\Models\Product;

class ElectronicsController extends Controller
{
    // Method to display all electronics
    public function electronics() {
        $electronics = Electronics::all(); // Fetch all electronics
        return view('pages.electronics', compact('electronics')); // Pass the correct variable
    }

    // Method to display a specific laptop by ID
    public function laptops($id) {
        // Fetch the electronic item by ID
        $electronics = Electronics::findOrFail($id); // Correctly fetch the specific electronic item

        // Pass the correct variable to the view
        return view('products.laptops', compact('electronics'));
    }
}
