<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Tampilkan daftar semua produk untuk pengguna
     */
    public function index(Request $request)
    {
        $categories = Category::withCount('products')->get();

        // Hitung total semua produk
        $totalProducts = Product::count();

        // Buat array count berdasarkan slug atau nama
        $counts = $categories->mapWithKeys(function ($cat) {
            return [Str::slug($cat->name) => $cat->products_count];
        });

        $products = Product::latest();

        if ($request->filled('category')) {
            $products->where('category_id', $request->category);
        }

        $products = $products->paginate(12);

        return view('user.shop.index', compact('products', 'categories', 'totalProducts', 'counts'));
    }



    /**
     * Tampilkan detail satu produk berdasarkan slug
     */ public function show($slug)
    {
        $product = Product::with(['category', 'images'])->where('slug', $slug)->firstOrFail();
        return view('user.shop.show', compact('product'));
    }
}
