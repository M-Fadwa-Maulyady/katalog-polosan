<?php

namespace App\Http\Controllers;

use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil produk terbaru (3 item)
        $produk_terbaru = Product::latest()->take(3)->get();

        return view('home', compact('produk_terbaru'));
    }
}
