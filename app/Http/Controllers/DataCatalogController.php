<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class DataCatalogController extends Controller
{
    public function index()
    {
        $produk = Product::orderBy('id', 'desc')->get();
        return view('admin.datacatalog.index', compact('produk'));
    }


    public function create()
    {
        return view('admin.datacatalog.create');
    }

    public function store(Request $request)
{
    // Validasi input
    $request->validate([
        'nama' => 'required|string|max:255',
        'harga' => 'required|numeric',
        'stok' => 'required|numeric',
        'gambar' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        'deskripsi' => 'nullable|string',
    ]);

    // Upload gambar
    $filename = time() . '_' . $request->file('gambar')->getClientOriginalName();
    $request->file('gambar')->move(public_path('tema/img/produk'), $filename);

    // Simpan ke database
    Product::create([
        'nama' => $request->nama,
        'harga' => $request->harga,
        'stok' => $request->stok,
        'gambar' => $filename,
        'deskripsi' => $request->deskripsi,
    ]);

    return redirect()->route('admin.datacatalog.index')
                    ->with('success', 'Produk berhasil ditambahkan!');
}


    public function edit($id)
    {
        $produk = Product::findOrFail($id);
    return view('admin.datacatalog.edit', compact('produk'));
    }

    public function update(Request $request, $id)
    {
     $produk = Product::findOrFail($id);

    $request->validate([
        'nama' => 'required|string|max:255',
        'harga' => 'required|numeric',
        'stok' => 'required|numeric',
        'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'deskripsi' => 'nullable|string',
    ]);

    // replace gambar jika diupload baru
    if ($request->hasFile('gambar')) {
        $filename = time() . '_' . $request->file('gambar')->getClientOriginalName();
        $request->file('gambar')->move(public_path('tema/img/produk'), $filename);

        // hapus gambar lama
        if (file_exists(public_path('tema/img/produk/' . $produk->gambar))) {
            unlink(public_path('tema/img/produk/' . $produk->gambar));
        }

        $produk->gambar = $filename;
    }

    // update data lain
    $produk->update([
        'nama' => $request->nama,
        'harga' => $request->harga,
        'stok' => $request->stok,
        'deskripsi' => $request->deskripsi,
    ]);

    return redirect()->route('admin.datacatalog.index')
                    ->with('success', 'Produk berhasil diperbarui!');
}

    public function destroy($id)
    {
        $produk = Product::findOrFail($id);

    // hapus gambar
    if (file_exists(public_path('tema/img/produk/' . $produk->gambar))) {
        unlink(public_path('tema/img/produk/' . $produk->gambar));
    }

    $produk->delete();

    return redirect()->route('admin.datacatalog.index')
                    ->with('success', 'Produk berhasil dihapus!');
    }

    public function detail($id)
{
    $produk = Product::findOrFail($id);
    return view('admin.datacatalog.detail', compact('produk'));
}

public function userCatalog()
{
    $produk = Product::orderBy('id', 'desc')->get();
    return view('catalog', compact('produk'));
}


}
