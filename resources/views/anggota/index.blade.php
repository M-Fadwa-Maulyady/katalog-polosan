<x-layoutAdmin title="Data Anggota">

    <h1 style="margin-bottom: 10px;">Data Anggota</h1>

    @if(session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- BUTTON TAMBAH -->
    <div style="margin-bottom: 20px;">
        <a href="{{ route('admin.createAnggota') }}" class="btn-add">
            <i class="fa-solid fa-plus"></i> Tambah Anggota
        </a>
    </div>

    <!-- TABLE WRAPPER -->
    <div class="table-wrapper">
        <table class="styled-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Alamat</th>
                    <th>No. Telp</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($anggota as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->alamat }}</td>
                    <td>{{ $item->no_telp }}</td>

                    <!-- AKSI -->
                    <td class="action-cell">
                        <div class="action-buttons">

                            <a href="{{ route('admin.editAnggota', $item->id) }}" class="btn-edit">
                                <i class="fa-solid fa-pen"></i>
                            </a>

                            <form action="{{ route('admin.deleteAnggota', $item->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Yakin hapus anggota ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn-delete">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>

                        </div>
                    </td>

                </tr>
                @endforeach
            </tbody>

        </table>
    </div>

    <!-- STYLE -->
    <style>
        .alert-success {
            background: #d1fae5;
            color: #065f46;
            padding: 12px 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            border: 1px solid #a7f3d0;
        }

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

        .action-cell {
            width: 120px;
        }

        .action-buttons {
            display: flex;
            gap: 6px;
        }

        .btn-edit,
        .btn-delete {
            padding: 6px 10px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            color: #fff;
            font-size: 13px;
            transition: 0.2s;
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
    </style>

</x-layoutAdmin>
