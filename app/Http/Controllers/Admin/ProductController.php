<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Tampilkan semua produk
     */
    public function index()
    {
        $products = Product::with('category', 'images')->latest()->paginate(10);
        return view('admin.dashboard.products.index', compact('products'));
    }

    /**
     * Tampilkan form tambah produk
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.dashboard.products.create', compact('categories'));
    }

    /**
     * Simpan produk baru
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'preorder' => 'required|numeric|min:0',
            'images' => 'required',
            'images.*' => 'image|mimes:jpg,jpeg,png|max:2048',
        ]);


        $product = Product::create([
            'name' => $validated['name'],
            'slug' => Str::slug($validated['name']),
            'category_id' => $validated['category_id'],
            'description' => $validated['description'],
            'price' => $validated['price'],
            'preorder' => $validated['preorder'],
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $image) {
                $path = $image->store('products', 'public');
                ProductImage::create([
                    'product_id' => $product->id,
                    'image_url' => $path,
                    'is_main' => $index === 0, // gambar pertama sebagai utama
                ]);
            }
        }


        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    /**
     * Tampilkan form edit
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.dashboard.products.edit', compact('product', 'categories'));
    }

    /**
     * Update produk
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'preorder' => 'required|numeric|min:0',
            'images.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $product->update([
            'name' => $validated['name'],
            'slug' => Str::slug($validated['name']),
            'category_id' => $validated['category_id'],
            'description' => $validated['description'],
            'price' => $validated['price'],
            'preorder' => $validated['preorder'],
        ]);

        // Hapus gambar yang ditandai oleh admin
        if ($request->filled('deleted_images')) {
            $imageIds = explode(',', $request->deleted_images);
            foreach ($imageIds as $id) {
                $image = ProductImage::where('product_id', $product->id)->where('id', $id)->first();
                if ($image) {
                    Storage::disk('public')->delete($image->image_url);
                    $image->delete();
                }
            }
        }

        // Upload gambar baru jika ada
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $imageFile) {
                $path = $imageFile->store('products', 'public');
                $product->images()->create([
                    'image_url' => $path,
                    'is_main' => $product->images()->count() === 0, // jika belum ada gambar, jadikan utama
                ]);
            }
        }

        return redirect()->route('products.index')->with('success', 'Produk berhasil diperbarui.');
    }


    /**
     * Hapus produk
     */
    public function destroy(Product $product)
    {
        // Hapus gambar dari storage
        foreach ($product->images as $image) {
            Storage::disk('public')->delete($image->image_url);
        }

        $product->images()->delete();
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus.');
    }
}
