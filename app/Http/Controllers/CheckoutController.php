<?php

namespace App\Http\Controllers;

use App\Models\Product; // Sesuaikan nama model kamu
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
        // Validasi data checkout
        $request->validate([
            'produk_id' => 'required|exists:products,id',
            'nama_penerima' => 'required|string|max:255',
            'alamat' => 'required',
            'telepon' => 'required',
        ]);

        // Proses simpan pesanan
        // (Ra bisa bikinin tabelnya kalau kamu mau…)

        return redirect()->route('home')->with('success', 'Pesanan berhasil dibuat!');
    }
}
