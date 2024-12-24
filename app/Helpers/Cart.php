<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Session;

class Cart
{
    private $items = [];
    private $total_quantity = 0;
    private $total_price = 0;

    public function __construct()
    {
        $this->items = session('cart') ? session('cart') : [];
    }

    public function list()
    {
        return $this->items;
    }
    // thêm sản phẩm
    public function add($product, $quantity = 1)
    {
        $item = [
            'productID' => $product->id,
            'name' => $product->name,
            'price' => $product->price_sale > 0 ? $product->price_sale : $product->price,
            'image' => $product->image,
            'quantity' => $quantity,
        ];
        $this->items[$product->id] = $item;
        session(['cart' => $this->items]);
    }

    // lấy tổng tiền

    public function getTotalPrice()
    {
        $totalPrice = 0;
        foreach ($this->items as $item) {
            $totalPrice += $item['price'] * $item['quantity'];
        }
        return $totalPrice;
    }
    public function getTotalQuantity()
    {
        $totalQuantity = 0;
        foreach ($this->items as $item) {
            $totalQuantity +=  $item['quantity'];
        }
        return $totalQuantity;
    }

    public function remove($id)
    {
        $cart = Session::get('cart', []);

        // Kiểm tra sản phẩm có trong giỏ hàng không
        if (isset($cart[$id])) {
            unset($cart[$id]);
            Session::put('cart', $cart);
        }
    }

    public function clear()
    {
        Session::forget('cart');
    }

    public function all()
    {
        return Session::get('cart', []);
    }
}
