<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Tampilkan daftar semua produk untuk pengguna
     */
    public function index()
    {
        $products = Product::with(['category', 'images'])->latest()->paginate(12);
        return view('user.shop.index', compact('products'));
    }

    /**
     * Tampilkan detail satu produk berdasarkan slug
     */ public function show($slug)
    {
        $product = Product::with(['category', 'images'])->where('slug', $slug)->firstOrFail();
        return view('user.shop.show', compact('product'));
    }
}
