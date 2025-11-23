<x-layoutUser title="Catalog">

<style>
/* GRID */
.product-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 35px;
    padding: 40px 80px;
}

/* CARD */
.product-card {
    position: relative;
    border-radius: 22px;
    background: #fff;
    padding: 15px;
    box-shadow: 0 8px 22px rgba(0,0,0,0.06);
    transition: .2s ease;
}
.product-card:hover {
    transform: translateY(-4px);
}

/* IMAGE */
.product-img {
    width: 100%;
    height: 260px;
    border-radius: 18px;
    object-fit: cover;
}

/* BADGE */
.badge {
    position: absolute;
    top: 18px;
    left: 18px;
    background: #fff;
    padding: 5px 10px;
    font-size: 12px;
    border-radius: 20px;
    box-shadow: 0 0 8px rgba(0,0,0,0.1);
}

/* BUTTONS */
.button-group {
    position: absolute;
    bottom: 18px;
    left: 18px;
    right: 18px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.icon-btn {
    width: 42px;
    height: 42px;
    border-radius: 50%;
    background: #eee;
    border: none;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
}

.icon-btn i {
    font-size: 18px;
    color: #444;
}

/* TEXT */
.product-name {
    font-size: 17px;
    font-weight: 600;
    margin-top: 10px;
}

.price-old {
    font-size: 16px;
    text-decoration: line-through;
    color: #b91c1c;
    font-weight: 500;
    margin-top: 3px;
}

.price-new {
    font-size: 17px;
    color: #1f2937;
    font-weight: 600;
}

/* MODAL */
.modal {
    display: none;
    position: fixed;
    inset: 0;
    background: rgba(0,0,0,0.45);
    backdrop-filter: blur(2px);
    justify-content: center;
    align-items: center;
    z-index: 999;
}

.modal-content {
    background: white;
    padding: 25px;
    border-radius: 16px;
    width: 420px;
    box-shadow: 0 8px 25px rgba(0,0,0,0.2);
    text-align: center;
    position: relative;
    animation: fadeIn .3s ease;
}

.close-btn {
    position: absolute;
    top: 12px;
    right: 18px;
    font-size: 28px;
    cursor: pointer;
}

.modal-img {
    width: 100%;
    height: 250px;
    object-fit: cover;
    border-radius: 12px;
}

.modal-harga {
    font-size: 20px;
    font-weight: bold;
    margin-top: 10px;
}

.modal-desc {
    margin-top: 10px;
    color: #555;
}

@keyframes fadeIn {
    from { opacity: 0; transform: scale(0.95); }
    to { opacity: 1; transform: scale(1); }
}
</style>

<h1 style="text-align:center; margin-top:30px;">Catalog</h1>

<div class="product-grid">

@foreach ($produk as $item)
<div class="product-card">

    <div class="badge">Exclusive Product</div>

    <img src="{{ asset('tema/img/produk/' . $item->gambar) }}" class="product-img">

    <!-- BUTTON GROUP -->
    <div class="button-group">

        <!-- DETAIL BUTTON PAKAI DATA ATTRIBUTE -->
        <button class="icon-btn openDetail"
            data-nama="{{ $item->nama }}"
            data-gambar="{{ asset('tema/img/produk/' . $item->gambar) }}"
            data-harga="Rp {{ number_format($item->harga, 0, ',', '.') }}"
            data-deskripsi="{{ $item->deskripsi }}">
            <i class="fa-solid fa-eye"></i>
        </button>

        <!-- CART BUTTON -->
        <button type="button" class="icon-btn goCheckout"
        data-id="{{ $item->id }}">
    <i class="fa-solid fa-cart-arrow-down"></i>
</button>

    </div>

    <div class="product-name">{{ $item->nama }}</div>
    <div class="price-old">Rp {{ number_format($item->harga + 50000, 0, ',', '.') }}</div>
    <div class="price-new">Rp {{ number_format($item->harga, 0, ',', '.') }}</div>

</div>

@endforeach

</div>

<!-- MODAL -->
<div id="detailModal" class="modal">
    <div class="modal-content">

        <span class="close-btn" onclick="closeDetail()">×</span>

        <h2 id="detail-nama"></h2>

        <p id="detail-harga" class="modal-harga"></p>
        <p id="detail-deskripsi" class="modal-desc"></p>

    </div>
</div>

<script>
function showDetail(nama, harga, deskripsi) {
    document.getElementById('detail-nama').innerText = nama;
    document.getElementById('detail-harga').innerText = harga;
    document.getElementById('detail-deskripsi').innerText = deskripsi;

    document.getElementById('detailModal').style.display = "flex";
}

function closeDetail() {
    document.getElementById('detailModal').style.display = "none";
}

// EVENT LISTENER UNTUK BUKA DETAIL
document.querySelectorAll('.openDetail').forEach(btn => {
    btn.addEventListener('click', function() {

        const nama = this.dataset.nama;
        const harga = this.dataset.harga;
        const deskripsi = this.dataset.deskripsi;

        // PANGGIL FUNGSI YANG UDAH ADA
        showDetail(nama, harga, deskripsi);
    });
});

document.querySelectorAll('.goCheckout').forEach(btn => {
    btn.addEventListener('click', function () {

        const id = this.dataset.id;

        // CEK USER LOGIN DARI LARAVEL
        @guest
            // Jika belum login → arahkan ke login
            window.location.href = "{{ route('login') }}";
        @endguest

        @auth
            // Jika sudah login → arahkan ke checkout produk
            window.location.href = "/checkout/" + id;
        @endauth

    });
});
</script>

</x-layoutUser>
