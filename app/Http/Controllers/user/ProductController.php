<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Tampilkan daftar semua produk untuk pengguna
     */
    public function index(Request $request)
    {
        $query = Product::query();

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $products = $query->latest()->paginate(12);

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
