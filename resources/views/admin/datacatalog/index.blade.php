<x-layoutAdmin title="Catalog">

    <h1 style="margin-bottom: 10px;">Data Catalog</h1>

    @if(session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif

    <style>
    .alert-success {
        background: #d1fae5;
        color: #065f46;
        padding: 12px 15px;
        border-radius: 8px;
        margin-bottom: 20px;
        border: 1px solid #a7f3d0;
    }
    </style>

    <!-- BUTTON TAMBAH -->
    <div style="margin-bottom: 20px;">
        <a href="{{ route('admin.datacatalog.create') }}" class="btn-add">
            <i class="fa-solid fa-plus"></i> Tambah Produk
        </a>
    </div>

    <!-- TABLE LIST PRODUK -->
    <div class="table-wrapper">
        <table class="styled-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Gambar</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Stock</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($produk as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>

                        <!-- GAMBAR -->
                        <td>
                            <img src="{{ asset('tema/img/produk/' . $item->gambar) }}" 
                                 class="img-product">
                        </td>

                        <!-- DATA PRODUK -->
                        <td>{{ $item->nama }}</td>
                        <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                        <td>{{ $item->stok }}</td>

                        <!-- TOMBOL AKSI -->
                        <td class="action-cell">
    <div class="action-buttons">
        <a href="{{ route('admin.datacatalog.edit', $item->id) }}" class="btn-edit">
            <i class="fa-solid fa-pen"></i>
        </a>

        <form action="{{ route('admin.datacatalog.delete', $item->id) }}" 
              method="POST" style="display:inline-block;"
              onsubmit="return confirm('Yakin hapus produk ini?')">
            @csrf
            @method('DELETE')
            <button class="btn-delete"><i class="fa-solid fa-trash"></i></button>
        </form>

        <a href="{{ route('admin.datacatalog.detail', $item->id) }}" class="btn-detail">
            <i class="fa-solid fa-eye"></i>
        </a>
    </div>
</td>


                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>

    <!-- STYLE SECTION -->
    <style>
        /* gambar produk */
        .img-product {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 8px;
            border: 1px solid #ddd;
        }

        /* tombol tambah */
        .btn-add {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: #2563eb;
            color: #fff;
            padding: 10px 16px;
            border-radius: 8px;
            font-size: 15px;
            text-decoration: none;
            transition: 0.2s;
        }

        .btn-add:hover {
            background: #1e40af;
        }

        .table-wrapper {
            background: #fff;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.06);
        }

        .styled-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 15px;
            overflow: hidden;
        }

        .styled-table thead tr {
            background-color: #1f2937;
            color: #ffffff;
            text-align: left;
        }

        .styled-table th, 
        .styled-table td {
            padding: 14px 12px;
            vertical-align: middle;
        }

        .styled-table tbody tr {
            border-bottom: 1px solid #dddddd;
            transition: 0.15s;
        }

        .styled-table tbody tr:hover {
            background-color: #f3f4f6;
        }

        .btn-edit, .btn-delete {
            padding: 7px 10px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            color: #fff;
            transition: 0.2s;
            margin-right: 5px;
        }

        .btn-edit {
            background: #10b981;
        }

        .btn-edit:hover {
            background: #059669;
        }

        .btn-delete {
            background: #ef4444;
        }

        .btn-delete:hover {
            background: #dc2626;
        }

        .btn-detail {
            padding: 7px 10px;
            background: #3b82f6;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            color: #fff;
            transition: 0.2s;
            margin-right: 5px;
            text-decoration: none;
        }

        .btn-detail:hover {
            background: #1d4ed8;
        }

        .action-cell {
    width: 120px;
}

.action-buttons {
    display: flex;
    gap: 4px;
}

.btn-edit, .btn-delete, .btn-detail {
    padding: 5px 8px;
    font-size: 13px;
    border-radius: 5px;
}

    </style>

</x-layoutAdmin>
