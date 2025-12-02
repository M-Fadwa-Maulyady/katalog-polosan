<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index($id)
    {
        $produk = Product::findOrFail($id);

        $ongkir = 10000;
        $layanan = 2500;

        $total = $produk->harga + $ongkir + $layanan;

        return view('checkout', compact('produk', 'ongkir', 'layanan', 'total'));
    }

    public function process(Request $request)
    {
        $request->validate([
            'produk_id'     => 'required|exists:products,id',
            'nama_penerima' => 'required|string|max:255',
            'alamat'        => 'required|string',
            'telepon'       => 'required|string',
            'total'         => 'required|numeric',
            'bukti'         => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        // Upload bukti
        $buktiPath = $request->file('bukti')->store('bukti-pembayaran', 'public');

        Order::create([
            'user_id'       => auth()->id(),
            'produk_id'     => $request->produk_id,
            'nama_penerima' => $request->nama_penerima,
            'alamat'        => $request->alamat,
            'telepon'       => $request->telepon,
            'bukti'         => $buktiPath,
            'total'         => $request->total,
        ]);

        return redirect()->route('riwayat')
            ->with('success', 'Pesanan berhasil! Bukti pembayaran terkirim.');
    }
}
