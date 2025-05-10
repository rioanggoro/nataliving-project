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
        // Ambil semua kategori dan jumlah produk di masing-masing kategori
        $categories = Category::withCount('products')->get();

        // Hitung total semua produk
        $totalProducts = Product::count();

        // Buat array slug => jumlah produk (untuk ditampilkan di UI)
        $counts = $categories->mapWithKeys(function ($category) {
            return [Str::slug($category->name) => $category->products_count];
        });

        // Query produk awal
        $productsQuery = Product::latest();

        // Jika user memilih filter kategori (bisa banyak)
        if ($request->has('category') && is_array($request->category)) {
            $productsQuery->whereIn('category_id', $request->category);
        }

        // Paginate hasil produk
        $products = $productsQuery->paginate(12);

        return view('user.shop.index', compact(
            'products',
            'categories',
            'totalProducts',
            'counts'
        ));
    }




    /**
     * Tampilkan detail satu produk berdasarkan slug
     */ public function show($slug)
    {
        $product = Product::with(['category', 'images'])->where('slug', $slug)->firstOrFail();
        return view('user.shop.show', compact('product'));
    }
}
