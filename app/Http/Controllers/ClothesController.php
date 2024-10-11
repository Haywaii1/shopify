<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Clothes;



class ClothesController extends Controller
{
    // Method to display all clothings
    public function clothes() {
        $clothes = Clothes::all(); // Fetch all clothings
        return view('pages.clothes', compact('clothes')); // Pass the correct variable
    }

    // Method to display a specific tshirt by ID
    public function tshirt($id) {
        // Fetch the clothing item by ID
        $clothes = Clothes::findOrFail($id); // Correctly fetch the specific clothing item

        // Pass the correct variable to the view
        return view('products.tshirt', compact('clothes'));
    }
}
