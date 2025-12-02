<x-layoutUser title="Checkout">

<style>
/* ==========================================
   MAIN WRAPPER
========================================== */
.checkout-container {
    display: flex;
    padding: 50px 120px;
    justify-content: space-between;
    gap: 40px;
    font-family: Arial, sans-serif;
}

/* ==========================================
   LEFT PRODUCT INFO
========================================== */
.left-section {
    width: 48%;
}

.left-section img {
    width: 360px;
    border-radius: 12px;
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
}

.product-desc {
    font-size: 15px;
    color: #666;
}

/* ==========================================
   RIGHT SUMMARY CARD
========================================== */
.right-section {
    width: 50%;
    background: #f7f4f4;
    padding: 50px;
    border-radius: 12px;
    box-shadow: 0 4px 14px rgba(0,0,0,0.08);
}

.right-title {
    font-size: 23px;
    font-weight: 700;
    margin-bottom: 25px;
}

.summary-row {
    display: flex;
    justify-content: space-between;
    font-size: 18px;
    margin-bottom: 8px;
}

.summary-total {
    display: flex;
    justify-content: space-between;
    font-size: 22px;
    font-weight: 700;
    margin-top: 25px;
}

/* ==========================================
   PAYMENT METHOD
========================================== */
.payment-title {
    margin-top: 35px;
    font-size: 18px;
    font-weight: 700;
}

.payment-method {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-top: 15px;
}

.payment-method img {
    height: 38px;
}

.qris-scan {
    margin-top: 20px;
    width: 150px;
}

/* ==========================================
   LOCATION DROPDOWN
========================================== */
.location-box {
    margin-bottom: 30px;
}

.location-label {
    font-size: 17px;
    font-weight: 700;
}

.location-select {
    padding: 12px 15px;
    border-radius: 6px;
    border: 1px solid #ccc;
    width: 260px;
}

/* ==========================================
   CARD FORM
========================================== */
.form-card {
    background:#ffffff;
    padding:35px;
    border-radius:16px;
    box-shadow:0 6px 18px rgba(0,0,0,0.08);
    margin: 45px 120px 40px 120px;
}

.form-group {
    margin-bottom:22px;
}

.form-group label {
    font-weight:600;
    font-size:15px;
}

.form-input,
.form-textarea {
    width:100%;
    padding:12px;
    border-radius:10px;
    border:1px solid #d9d9d9;
    font-size:15px;
    margin-top:8px;
}

.form-textarea {
    height:90px;
}

/* ==========================================
   UPLOAD CARD
========================================== */
.upload-inner {
    margin-top:15px;
    padding:45px 20px;
    border-radius:16px;
    background:#ffffff;
    border:1px solid #e4e4e4;
    cursor:pointer;
    text-align:center;
    transition:0.25s;
    box-shadow:0 6px 18px rgba(0,0,0,0.07);
}

.upload-inner:hover {
    border-color:#1f2937;
    transform:translateY(-2px);
    box-shadow:0 8px 22px rgba(0,0,0,0.1);
}

.upload-icon {
    font-size:50px;
    color:#444;
}

.upload-note {
    font-size:13px;
    color:#777;
}

.upload-preview {
    display:none;
    width:220px;
    margin-top:20px;
    border-radius:12px;
    box-shadow:0 5px 15px rgba(0,0,0,0.12);
}

/* ==========================================
   SUBMIT BUTTON
========================================== */
.btn-submit {
    width:100%;
    margin-top:30px;
    padding:15px;
    background:#1f2937;
    color:white;
    border:none;
    border-radius:12px;
    font-size:17px;
    cursor:pointer;
}

.btn-submit:hover {
    background:#111827;
}

</style>



<!-- ==========================================
     MAIN CHECKOUT SECTION
========================================== -->
<div class="checkout-container">

    <!-- LEFT -->
    <div class="left-section">
        <img src="{{ asset('tema/img/produk/' . $produk->gambar) }}">

        <div class="product-title">{{ $produk->nama }}</div>
        <div class="product-price">Rp{{ number_format($produk->harga,0,',','.') }}</div>
        <div class="product-desc">{{ $produk->deskripsi }}</div>
    </div>

    <!-- RIGHT -->
    <div class="right-section">

        <div class="location-box">
            <label class="location-label">Pilih Kota Pengiriman</label>
            <select id="kota" onchange="updateOngkir()" class="location-select">
                <option disabled selected>-- pilih kota --</option>
                <option value="jakarta">Jakarta</option>
                <option value="bandung">Bandung</option>
                <option value="surabaya">Surabaya</option>
                <option value="medan">Medan</option>
            </select>
        </div>

        <div class="right-title">Ringkasan Pemesanan</div>

        <div class="summary-row">
            <span>Subtotal Produk</span>
            <span id="hargaText">Rp{{ number_format($produk->harga,0,',','.') }}</span>
        </div>

        <div class="summary-row">
            <span>Ongkir</span>
            <span id="ongkirText">Rp{{ number_format($ongkir,0,',','.') }}</span>
        </div>

        <div class="summary-row">
            <span>Layanan Pelanggan</span>
            <span id="layananText">Rp{{ number_format($layanan,0,',','.') }}</span>
        </div>

        <div class="summary-total">
            <span>Total</span>
            <span id="totalText">Rp{{ number_format($total,0,',','.') }}</span>
        </div>

        <div class="payment-title">Metode Pembayaran</div>
        <div class="payment-method">
            <img src="{{ asset('tema/img/qris-logo.jpeg') }}">
            <input type="radio" checked>
        </div>

        <img class="qris-scan" src="{{ asset('tema/img/qris-scan.png') }}">
    </div>

</div>



<!-- ==========================================
     FULL FORM CARD
========================================== -->
<form action="{{ route('checkout.process') }}" method="POST" enctype="multipart/form-data">
@csrf

<input type="hidden" name="produk_id" value="{{ $produk->id }}">
<input type="hidden" name="total" id="totalInput" value="{{ $total }}">

<div class="form-card">

    <h2 style="font-size:22px; font-weight:700; margin-bottom:25px;">
        Informasi Penerima
    </h2>

    <!-- Nama -->
    <div class="form-group">
        <label>Nama Penerima</label>
        <input type="text" name="nama_penerima" class="form-input" required>
    </div>

    <!-- Alamat -->
    <div class="form-group">
        <label>Alamat Lengkap</label>
        <textarea name="alamat" class="form-textarea" required></textarea>
    </div>

    <!-- Telepon -->
    <div class="form-group">
        <label>Nomor Telepon</label>
        <input type="text" name="telepon" class="form-input" required>
    </div>

    <!-- Upload -->
    <label style="font-size:16px; font-weight:700;">Upload Bukti Pembayaran</label>
    <div class="upload-inner" onclick="document.getElementById('buktiInput').click()">
        <i class="fa-solid fa-cloud-arrow-up upload-icon"></i>
        <h4 style="margin-top:10px;">Klik untuk upload bukti</h4>
        <p class="upload-note">(Format JPG, JPEG, PNG – Max 2MB)</p>
    </div>

    <input type="file" id="buktiInput" name="bukti" accept="image/*" style="display:none;" required onchange="previewBukti(event)">
    <img id="previewImage" class="upload-preview">

    <button type="submit" class="btn-submit">
        Kirim Pembayaran
    </button>
</div>

</form>



<script>
function updateOngkir() {
    const kota = document.getElementById('kota').value;

    let ongkir = 10000;
    if (kota === 'jakarta') ongkir = 8000;
    if (kota === 'bandung') ongkir = 9000;
    if (kota === 'surabaya') ongkir = 12000;
    if (kota === 'medan') ongkir = 15000;

    const harga = {{ $produk->harga }};
    const layanan = {{ $layanan }};
    const total = harga + layanan + ongkir;

    document.getElementById('ongkirText').innerText = "Rp" + ongkir.toLocaleString('id-ID');
    document.getElementById('totalText').innerText = "Rp" + total.toLocaleString('id-ID');
    document.getElementById('totalInput').value = total;
}

function previewBukti(event) {
    const img = document.getElementById("previewImage");
    img.src = URL.createObjectURL(event.target.files[0]);
    img.style.display = "block";
}
</script>

</x-layoutUser>
