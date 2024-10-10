<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;


class HomePageController extends Controller
{
    // public function welcome()
    // {
    //     return view('welcome');
    // }
    public function welcome(){
        $products = product::all();

        return view('welcome', compact('products'));
    }
}
