<x-layoutUser title="Checkout">

<style>
.checkout-container {
    display: flex;
    padding: 50px 120px;
    justify-content: space-between;
    font-family: Arial, sans-serif;
}

/* LEFT */
.left-section {
    width: 48%;
}

.left-section img {
    width: 360px;
    margin-bottom: 15px;
}

.product-title {
    font-size: 34px;
    font-weight: 700;
}

.product-price {
    font-size: 24px;
    color: red;
    font-weight: 700;
    margin: 10px 0 20px 0;
}

.product-desc {
    font-size: 15px;
    color: #666;
    margin-top: 10px;
}

/* RIGHT */
.right-section {
    width: 50%;
    background: #f7f4f4;
    padding: 50px;
}

.right-title {
    font-size: 23px;
    font-weight: 700;
    margin-bottom: 25px;
}

.summary-row {
    display: flex;
    justify-content: space-between;
    margin-bottom: 8px;
    font-size: 18px;
}

.summary-total {
    display: flex;
    justify-content: space-between;
    margin-top: 25px;
    font-size: 22px;
    font-weight: 700;
}

/* PAYMENT */
.payment-title {
    margin-top: 35px;
    font-size: 18px;
    font-weight: 700;
}

.payment-method {
    margin-top: 15px;
    display: flex;
    align-items: center;
    gap: 12px;
}

.payment-method img {
    height: 38px;
}

.qris-scan {
    margin-top: 20px;
    width: 150px;
}

.location-box {
    margin-bottom: 30px;
    display: flex;
    flex-direction: column;
}

.location-label {
    font-weight: 700;
    font-size: 17px;
    margin-bottom: 8px;
}

.location-select {
    padding: 12px 15px;
    border-radius: 6px;
    border: 1px solid #ccc;
    font-size: 15px;
    width: 260px;
    background: white;
    cursor: pointer;
    transition: 0.2s ease;
}

.location-select:hover {
    border-color: #999;
}

.location-select:focus {
    outline: none;
    border-color: #000;
}

</style>


<div class="checkout-container">

    <!-- LEFT -->
    <div class="left-section">
        <img src="{{ asset('tema/img/produk/' . $produk->gambar) }}">

        <div class="product-title">{{ $produk->nama }}</div>

        <div class="product-price">
            Rp{{ number_format($produk->harga, 0, ',', '.') }}
        </div>

        <div class="product-desc">
            {{ $produk->deskripsi }}
        </div>
    </div>


    <!-- RIGHT -->
    <div class="right-section">

        <div class="location-box">

    <label class="location-label">Pilih Kota Pengiriman</label>

    <select id="kota" onchange="updateOngkir()" class="location-select">
        <option value="" disabled selected>-- pilih kota --</option>
        <option value="jakarta">Jakarta</option>
        <option value="bandung">Bandung</option>
        <option value="surabaya">Surabaya</option>
        <option value="medan">Medan</option>
    </select>

</div>



        <div class="right-title">Ringkasan pemesanan</div>

        <div class="summary-row">
            <span>Subtotal produk</span>
            <span id="hargaText">Rp{{ number_format($produk->harga, 0, ',', '.') }}</span>
        </div>

        <div class="summary-row">
            <span>Ongkir</span>
            <span id="ongkirText">Rp{{ number_format($ongkir, 0, ',', '.') }}</span>
        </div>

        <div class="summary-row">
            <span>Layanan pelanggan</span>
            <span id="layananText">Rp{{ number_format($layanan, 0, ',', '.') }}</span>
        </div>

        <div class="summary-total">
            <span>Total</span>
            <span id="totalText">Rp{{ number_format($total, 0, ',', '.') }}</span>
        </div>

        <div class="payment-title">Metode pembayaran</div>

        <div class="payment-method">
            <img src="{{ asset('tema/img/qris-logo.jpeg') }}">
            <input type="radio" checked>
        </div>

        <img class="qris-scan" src="{{ asset('tema/img/qris-scan.png') }}">

    </div>

</div>

<script>
function updateOngkir() {
    const kota = document.getElementById('kota').value;

    let ongkir = 10000; // default

    if (kota === 'jakarta') ongkir = 8000;
    if (kota === 'bandung') ongkir = 9000;
    if (kota === 'surabaya') ongkir = 12000;
    if (kota === 'medan') ongkir = 15000;

    const harga = {{ $produk->harga }};
    const layanan = {{ $layanan }};
    const total = harga + layanan + ongkir;

    // update UI
    document.getElementById('ongkirText').innerText = "Rp" + ongkir.toLocaleString('id-ID');
    document.getElementById('totalText').innerText = "Rp" + total.toLocaleString('id-ID');
}
</script>

</x-layoutUser>
