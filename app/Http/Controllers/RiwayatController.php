<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class RiwayatController extends Controller
{
    public function index()
    {
        // Ambil pesanan user yang sedang login
        $orders = Order::where('user_id', auth()->id())
                       ->orderBy('created_at', 'desc')
                       ->get();

        return view('riwayat.index', compact('orders'));
    }
}
