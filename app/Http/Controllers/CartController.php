<?php

namespace App\Http\Controllers;

use App\Helpers\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index(Cart $cart)
    {

        return view('fe.cart', compact('cart'));
    }

    public function add(Request $request, Cart $cart)
    {
        $product = Product::find($request->id);
        $quantity = $request->quantity;
        $cart->add($product, $quantity);
        return redirect()->route('cart.index');
    }

    public function remove(Request $request, Cart $cart)
    {
        $cart->remove($request->id);
        return redirect()->route('cart.index')->with('success', 'Sản phẩm đã được xóa khỏi giỏ hàng.');
    }

    public function clear(Cart $cart)
    {
        $cart->clear();
        return redirect()->route('cart.index')->with('success', 'Giỏ hàng đã được xóa.');
    }

    public function update(Request $request, Cart $cart)
    {
        $id = $request->id;
        $quantity = $request->quantity;

        $currentCart = $cart->all();

        if (isset($currentCart[$id])) {
            $currentCart[$id]['quantity'] = $quantity;
            Session::put('cart', $currentCart);
        }

        return response()->json(['success' => true, 'message' => 'Cập nhật số lượng thành công']);
    }

    public function checkout(Cart $cart)
    {
        $cartItems = $cart->all();

        if (empty($cartItems)) {
            return redirect()->route('cart.index')->with('error', 'Giỏ hàng của bạn đang trống.');
        }

        return view('fe.checkout', compact('cartItems'));
    }

    public function processCheckout(Request $request, Cart $cart)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'address' => 'required|string',
            'phone' => 'required|numeric',
        ]);

        $cartItems = $cart->all();

        if (empty($cartItems)) {
            return redirect()->route('cart.index')->with('error', 'Giỏ hàng của bạn đang trống.');
        }

        $order = Order::create([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
            'total_price' => array_sum(array_column($cartItems, 'price')),
            'items' => $cartItems,
            'created_at' => now(),
        ]);

        // dd($order);
        foreach ($cartItems as $item) {
            OrderDetail::create([
                'order_id' => $order->id,
                'product_name' => $item['name'],
                'price' => $item['price'],
                'quantity' => $item['quantity'],
            ]);
        }


        $cart->clear();

        return redirect()->route('cart.thankYou');
    }

    public function thankYou()
    {
        return view('fe.thank_you');
    }
}
