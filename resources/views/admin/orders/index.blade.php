<x-layoutAdmin title="Data Pesanan">

<h1 style="margin-bottom: 18px;">Data Pesanan</h1>

@if (session('success'))
    <div class="alert-success">{{ session('success') }}</div>
@endif

<div class="table-wrapper">
<table class="styled-table">
<thead>
<tr>
    <th>No</th>
    <th>Pembeli</th>
    <th>Produk</th>
    <th>Total</th>
    <th>Telepon</th>
    <th>Bukti Pembayaran</th>
    <th>Status</th>
    <th>Aksi</th>
</tr>
</thead>

<tbody>
@foreach ($orders as $item)
<tr>
    <td>{{ $loop->iteration }}</td>

    <td>{{ $item->nama_penerima }}</td>

    <td>{{ $item->produk->nama }}</td>

    <td>Rp {{ number_format($item->total, 0, ',', '.') }}</td>

    <td>{{ $item->telepon }}</td>

    <td>
        <a href="{{ asset('storage/' . $item->bukti) }}" target="_blank">
            <img src="{{ asset('storage/' . $item->bukti) }}"
                 class="bukti-img">
        </a>
    </td>

    <td>
        <span class="status {{ $item->status }}">
            {{ ucfirst($item->status) }}
        </span>
    </td>

    <td>
        <div class="action-buttons">

            <!-- PROSES -->
            <form action="{{ route('admin.orders.status', [$item->id, 'proses']) }}" method="POST">
                @csrf
                <button class="btn-process">Proses</button>
            </form>

            <!-- SELESAI -->
            <form action="{{ route('admin.orders.status', [$item->id, 'selesai']) }}" method="POST">
                @csrf
                <button class="btn-finish">Selesai</button>
            </form>

            <!-- TOLAK -->
            <form action="{{ route('admin.orders.status', [$item->id, 'ditolak']) }}" method="POST"
                  onsubmit="return confirm('Yakin tolak pesanan ini?')">
                @csrf
                <button class="btn-reject">Tolak</button>
            </form>

        </div>
    </td>
</tr>
@endforeach
</tbody>

</table>
</div>


{{-- ===== CSS STYLE ===== --}}
<style>
.table-wrapper {
    background: #fff;
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.08);
}

.styled-table {
    width: 100%;
    border-collapse: collapse;
    font-size: 15px;
}

.styled-table thead tr {
    background: #1f2937;
    color: white;
}

.styled-table th, .styled-table td {
    padding: 14px 12px;
    border-bottom: 1px solid #e5e7eb;
}

.bukti-img {
    width: 60px;
    height: 60px;
    border-radius: 8px;
    object-fit: cover;
    border: 1px solid #ddd;
}

/* STATUS COLORS */
.status {
    padding: 6px 12px;
    border-radius: 6px;
    font-size: 14px;
    font-weight: 600;
    text-transform: capitalize;
}

.status.proses { background: #bfdbfe; color:#1e3a8a; }
.status.selesai { background: #bbf7d0; color:#166534; }
.status.ditolak { background: #fecaca; color:#7f1d1d; }

/* ACTION BUTTONS */
.action-buttons {
    display: flex;
    gap: 6px;
}

.action-buttons button {
    padding: 8px 12px;
    font-size: 13px;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    color: white;
    font-weight: 600;
}

/* warna tombol */
.btn-process { background: #2563eb; }
.btn-process:hover { background: #1e40af; }

.btn-finish { background: #10b981; }
.btn-finish:hover { background: #059669; }

.btn-reject { background: #ef4444; }
.btn-reject:hover { background: #dc2626; }

/* alert */
.alert-success {
    background: #d1fae5;
    color: #065f46;
    padding: 12px;
    border-radius: 8px;
    margin-bottom: 18px;
}
</style>

</x-layoutAdmin>
