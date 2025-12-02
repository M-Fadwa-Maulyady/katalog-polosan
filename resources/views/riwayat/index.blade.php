<x-layoutUser title="Riwayat Pesanan">

<style>
/* ==== WRAPPER UTAMA ==== */
.riwayat-wrapper {
    padding: 50px 120px 120px; /* TAMBAH padding bawah (120px) */
    min-height: 80vh; /* Biar footer tetap di bawah */
    font-family: Arial;
}

/* ==== TITLE ==== */
.riwayat-title {
    font-size: 32px;
    font-weight: 700;
    margin-bottom: 30px;
}

/* ==== CARD ==== */
.riwayat-card {
    background: #fff;
    padding: 25px 30px;
    border-radius: 20px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.06);
    margin-bottom: 25px;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

/* LEFT CONTENT */
.left-block {
    display: flex;
    gap: 25px;
    align-items: center;
}

.left-block img {
    width: 120px;
    height: 120px;
    object-fit: cover;
    border-radius: 14px;
}

.riwayat-info h3 {
    font-size: 21px;
    margin-bottom: 8px;
}

.riwayat-info p {
    font-size: 15px;
    line-height: 1.4;
    color: #555;
}

/* RIGHT CONTENT */
.right-block {
    display: flex;
    flex-direction: column;
    align-items: flex-end;
    gap: 12px;
}

/* STATUS BADGE */
.status-badge {
    padding: 8px 14px;
    border-radius: 10px;
    font-size: 13px;
    font-weight: 600;
    text-transform: uppercase;
}

.status-pending  { background: #fef9c3; color: #854d0e; }
.status-proses   { background: #dbeafe; color: #1e40af; }
.status-selesai  { background: #dcfce7; color: #166534; }
.status-ditolak  { background: #fee2e2; color: #991b1b; }

/* BUTTON LIHAT BUKTI */
.btn-bukti {
    background: #1f2937;
    color: #fff;
    text-decoration: none;
    font-size: 14px;
    padding: 10px 18px;
    border-radius: 10px;
    transition: 0.2s ease;
}

.btn-bukti:hover {
    background: #111827;
}
</style>



<div class="riwayat-wrapper">

    <div class="riwayat-title">Riwayat Pesanan</div>

    @foreach ($orders as $item)
        <div class="riwayat-card">

            <!-- LEFT -->
            <div class="left-block">
                <img src="{{ asset('tema/img/produk/' . $item->produk->gambar) }}">

                <div class="riwayat-info">
                    <h3>{{ $item->produk->nama }}</h3>

                    <p>Total: <b>Rp {{ number_format($item->total, 0, ',', '.') }}</b></p>
                    <p>Tanggal: {{ $item->created_at->format('d M Y') }}</p>
                </div>
            </div>

            <!-- RIGHT -->
            <div class="right-block">
                
                @if($item->status == 'pending')
                    <span class="status-badge status-pending">PENDING</span>
                @elseif($item->status == 'proses')
                    <span class="status-badge status-proses">PROSES</span>
                @elseif($item->status == 'selesai')
                    <span class="status-badge status-selesai">SELESAI</span>
                @else
                    <span class="status-badge status-ditolak">DITOLAK</span>
                @endif

                <a class="btn-bukti" href="{{ asset('storage/' . $item->bukti) }}" target="_blank">
                    Lihat Bukti Pembayaran
                </a>

            </div>

        </div>
    @endforeach

</div>

</x-layoutUser>
