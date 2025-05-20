<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Blog;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::with('images')->latest()->take(8)->get();
        return view('welcome', compact('products'));
    }

    public function galery()
    {
        return view('user.galery');
    }
    public function about()
    {
        return view('user.profile');
    }
    public function myStore()
    {
        return view('user.my-store');
    }

    public function blogIndex()
    {
        $blogs = Blog::latest()->paginate(6);
        $recentBlogs = Blog::latest()->take(5)->get();
        
        return view('user.blog.blog', compact('blogs', 'recentBlogs'));
    }

    public function blogShow($slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();
        $recentBlogs = Blog::where('id', '!=', $blog->id)
                          ->latest()
                          ->take(5)
                          ->get();
        
        return view('user.blog.detail-blog', compact('blog', 'recentBlogs'));
    }
}
