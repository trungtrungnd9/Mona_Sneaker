<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $spnoibats = Product::where('stock', 1)->paginate(8);
        $products = Product::where('category_id', 2)->paginate(4);
        $products_sale = Product::where('stock', 0)
            ->where('category_id', 1)
            ->paginate(4);
        return view('fe.home', compact('spnoibats', 'products', 'products_sale'));
    }

    public function about()
    {
        return view('fe.about');
    }
    public function nam()
    {
        $products = Product::where('pl', 0)->paginate(8);
        return view('fe.phanloai', compact('products'));
    }
    public function nu()
    {
        $products = Product::where('pl', 1)->paginate(8);
        return view('fe.phanloai', compact('products'));
    }
    public function treem()
    {
        $products = Product::where('pl', 2)->paginate(8);
        return view('fe.phanloai', compact('products'));
    }
    public function dmphukien()
    {
        $products = Product::where('category_id', 2)->paginate(8);
        return view('fe.phanloai', compact('products'));
    }
    public function tintuc()
    {
        return view('fe.tintuc');
    }
    public function lienhe()
    {
        return view('fe.lienhe');
    }
    public function show($id)
    {
        $product = Product::findOrFail($id);
        $products = Product::where('category_id', $product->category_id)->paginate(4);
        return view('fe.show', compact('product', 'products'));
    }
}
