<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use App\Models\ImgProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category')->get();
        return view('admin/product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $categoris =  Category::all();
        return view('admin/product.create', compact('categoris'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'name' => 'required|unique:products',
            'description' => 'nullable',
            'price' => 'required',
            'price_sale' => 'nullable',
            'quantity' => 'required',
            'pl' => 'required',
            'image' => 'nullable',
            'category_id' => 'required',
        ]);
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $validated['image'] = $imagePath;
        }
        $validated['stock'] = $request->has('stock') ? 1 : 0;

        Product::create($validated);
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categoris =  Category::all();
        $product = Product::findOrFail($id);
        return view('admin/product.edit', compact('product', 'categoris'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);
        $validated = $request->validate([
            'name' => 'required|unique:products',
            'description' => 'nullable',
            'price' => 'required',
            'price_sale' => 'nullable',
            'quantity' => 'required',
            'pl' => 'required',
            'image' => 'nullable',
            'category_id' => 'required',
        ]);
        $imagePath = $product->image;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $validated['image'] = $imagePath;
        }
        $product->update($validated);
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('product.index');
    }
}
