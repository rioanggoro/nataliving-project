<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalProducts = Product::count();
        $totalCategories = Category::count();
        $latestProducts = Product::with('category', 'images')->latest()->take(5)->get();

        return view('admin.dashboard.dashboard', compact('totalProducts', 'totalCategories', 'latestProducts'));
    }
}
