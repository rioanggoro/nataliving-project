<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::with('images')->latest()->take(8)->get();
        return view('welcome', compact('products'));
    }
}
