<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'produk_id',
        'nama_penerima',
        'alamat',
        'telepon',
        'bukti',
        'total',
    ];

    // RELASI KE PRODUK
    public function produk()
    {
        return $this->belongsTo(Product::class, 'produk_id');
    }

    // RELASI KE USER
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
