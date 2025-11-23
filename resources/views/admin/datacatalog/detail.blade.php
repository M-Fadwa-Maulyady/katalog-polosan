<x-layoutAdmin title="Detail Produk">

    <h1 style="margin-bottom: 20px;">Detail Produk</h1>

    <div class="detail-wrapper">
        
        <img src="{{ asset('tema/img/produk/' . $produk->gambar) }}" class="detail-image">

        <div class="detail-info">
            <h2>{{ $produk->nama }}</h2>
            <p><strong>Harga:</strong> Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>
            <p><strong>Stock:</strong> {{ $produk->stok }}</p>

            <div class="detail-desc">
                <strong>Deskripsi:</strong>
                <p>{{ $produk->deskripsi }}</p>
            </div>
        </div>
    </div>

    <style>
        .detail-wrapper {
            display: flex;
            gap: 30px;
            background: #fff;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.06);
        }

        .detail-image {
            width: 260px;
            height: 260px;
            border-radius: 12px;
            object-fit: cover;
        }

        .detail-info {
            font-size: 16px;
        }

        .detail-info h2 {
            margin-bottom: 10px;
        }

        .detail-desc {
            margin-top: 15px;
        }
    </style>

</x-layoutAdmin>
