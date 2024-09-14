<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function electronics(){
        return view('pages.electronics');
    }
    public function fashion(){
        return view('pages.fashion');
    }
    public function jewellery(){
        return view('pages.jewellery');
    }
}
