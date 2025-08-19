<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductSku;
use Illuminate\Http\Request;

class ProductSkuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $skus = ProductSku::with('product')->latest()->paginate(15);
        return view('admin.skus.index', compact('skus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Ambil semua produk untuk ditampilkan di dropdown.
        $products = Product::orderBy('name')->get();
        return view('admin.skus.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id', // Validasi produk harus ada
            'name' => 'required|string|max:255',
            'sku' => 'required|string|max:255|unique:product_skus,sku',
        ]);

        ProductSku::create($request->all());

        return redirect()->route('skus.index')
            ->with('success', 'SKU created successfully.');
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductSku $sku)
    {
        $products = Product::orderBy('name')->get();
        return view('admin.skus.edit', compact('sku', 'products'));
    }


    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, ProductSku $sku)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'name' => 'required|string|max:255',
            'sku' => 'required|string|max:255|unique:product_skus,sku,' . $sku->id,
        ]);

        $sku->update($request->all());

        return redirect()->route('skus.index')
            ->with('success', 'SKU updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductSku $sku)
    {
        $sku->delete();

        return redirect()->route('skus.index')
            ->with('success', 'SKU deleted successfully.');
    }
}
