<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAnggotaRequest;
use App\Http\Requests\UpdateAnggotaRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AnggotaController extends Controller
{
    /** Tampilkan semua anggota */
    public function index()
    {
        return view('anggota.index', [
            'anggota' => User::all()
        ]);
    }

    /** Form tambah anggota */
    public function create()
    {
        return view('anggota.create');
    }

    /** Simpan anggota baru */
    public function store(StoreAnggotaRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);

        User::create($data);

        return redirect()
            ->route('admin.dataAnggota')
            ->with('success', 'Anggota berhasil ditambahkan.');
    }

    /** Form edit anggota */
    public function edit($id)
    {
        return view('anggota.edit', [
            'anggota' => User::findOrFail($id)
        ]);
    }

    /** Update anggota */
    public function update(UpdateAnggotaRequest $request, $id)
    {
        $anggota = User::findOrFail($id);
        $data = $request->validated();

        // Jika password tidak diubah
        if (!$data['password']) {
            unset($data['password'], $data['password_confirmation']);
        } else {
            $data['password'] = Hash::make($data['password']);
        }

        $anggota->update($data);

        return redirect()
            ->route('admin.dataAnggota')
            ->with('success', 'Anggota berhasil diperbarui.');
    }

    /** Hapus anggota */
    public function destroy($id)
    {
        User::findOrFail($id)->delete();

        return redirect()
            ->route('admin.dataAnggota')
            ->with('success', 'Anggota berhasil dihapus.');
    }
}
