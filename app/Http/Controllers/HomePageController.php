<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ClothesController;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Clothes;
use App\Models\Electronics;


class HomePageController extends Controller
{
    // public function welcome()
    // {
    //     return view('welcome');
    // }
    public function welcome(){
        $products = product::all();
        $clothes = clothes::all();
        $electronics = electronics::all();

        return view('welcome', compact('products', 'clothes', 'electronics')); // Pass both variables to the view
    }
}
