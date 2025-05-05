<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category', 'images')->latest()->paginate(12);
        return view('user.products.index', compact('products'));
    }

    public function show($slug)
    {
        $product = Product::with('category', 'images')->where('slug', $slug)->firstOrFail();
        return view('user.products.show', compact('product'));
    }
}
