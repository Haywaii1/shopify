<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Clothes;
use App\Models\Electronics;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home(){
        $products = product::all();
        $clothes = clothes::all();
        $electronics = electronics::all();

        return view('home', compact('products', 'clothes', 'electronics')); // Pass both variables to the view
    }
}
