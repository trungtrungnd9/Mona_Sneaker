<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::get();
        return view('admin/order.index', compact('orders'));
    }


    public function show($id)
    {
        $order = Order::with('details')->findOrFail($id);
        return view('admin/order.show', compact('order'));
    }

    public function updateStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $order->update([
            'status' => $request->status,
        ]);

        return redirect()->route('admin.orders.show', $id)->with('success', 'Trạng thái đơn hàng đã được cập nhật.');
    }
}
