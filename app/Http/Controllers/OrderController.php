<?php

namespace App\Http\Controllers;

use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('produk')->orderBy('created_at','desc')->get();
        return view('admin.orders.index', compact('orders'));
    }

    public function delete($id)
    {
        Order::findOrFail($id)->delete();
        return back()->with('success','Pesanan berhasil dihapus');
    }

    public function updateStatus($id, $status)
    {
        $order = Order::findOrFail($id);
        $order->status = $status;
        $order->save();

        return back()->with('success', 'Status pesanan diperbarui!');
    }

        public function riwayat()
    {
        $orders = Order::where('user_id', auth()->id())
                    ->with('produk')
                    ->latest()
                    ->get();

        return view('riwayat', compact('orders'));
    }


}
