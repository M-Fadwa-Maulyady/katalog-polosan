<x-layoutAdmin title="Edit Produk">

<div class="container-center">

    <!-- HEADER -->
    <div class="header-title">
        <h1>Edit Produk</h1>
        <p>Perbarui informasi produk dengan benar.</p>
    </div>

    <!-- CARD FORM -->
    <div class="form-card">

        <form action="{{ route('admin.datacatalog.update', $produk->id) }}" 
              method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- GAMBAR -->
            <div class="form-group">
                <label>Gambar Produk Saat Ini</label>
                <img src="{{ asset('tema/img/produk/' . $produk->gambar) }}" 
                     style="width: 120px; height:120px; object-fit:cover; border-radius:10px; border:1px solid #ddd; margin-bottom:10px;">
            </div>

            <div class="form-group">
                <label>Gambar Baru (Opsional)</label>
                <input type="file" name="gambar" class="input-field">
            </div>

            <!-- NAMA -->
            <div class="form-group">
                <label>Nama Produk <span>*</span></label>
                <input type="text" name="nama" class="input-field" value="{{ $produk->nama }}">
            </div>

            <!-- HARGA & STOK -->
            <div class="form-row">
                <div class="form-group-row">
                    <label>Harga <span>*</span></label>
                    <input type="number" name="harga" class="input-field" value="{{ $produk->harga }}">
                </div>

                <div class="form-group-row">
                    <label>Stok <span>*</span></label>
                    <input type="number" name="stok" class="input-field" value="{{ $produk->stok }}">
                </div>
            </div>

            <!-- DESKRIPSI -->
            <div class="form-group">
                <label>Deskripsi</label>
                <textarea name="deskripsi" class="input-area">{{ $produk->deskripsi }}</textarea>
            </div>

            <!-- BUTTON -->
            <button type="submit" class="btn-submit">
                <i class="fa-solid fa-save"></i> Update Produk
            </button>

        </form>

    </div>
</div>

<style>
/* Container utama */
.container-center {
    max-width: 700px;
    margin: 0 auto;
    margin-top: 30px;
}

/* Header */
.header-title h1 {
    font-size: 28px;
    font-weight: 700;
}

.header-title p {
    color: #6b7280;
    margin-bottom: 20px;
}

/* Card */
.form-card {
    background: #ffffff;
    padding: 30px;
    border-radius: 16px;
    box-shadow: 0 8px 22px rgba(0, 0, 0, 0.06);
}

/* Grup input */
.form-group {
    margin-bottom: 20px;
    display: flex;
    flex-direction: column;
}

/* Dua kolom */
.form-row {
    display: flex;
    gap: 20px;
    margin-bottom: 20px;
}

.form-group-row {
    flex: 1;
    display: flex;
    flex-direction: column;
}

/* Label */
.form-group label, .form-group-row label {
    font-size: 14px;
    font-weight: 600;
    margin-bottom: 6px;
}

.form-group label span {
    color: #ef4444;
}

/* Input */
.input-field, .input-area {
    padding: 12px 15px;
    border-radius: 10px;
    border: 1px solid #d1d5db;
    background: #f9fafb;
    transition: .2s ease;
    font-size: 15px;
}

.input-field:focus,
.input-area:focus {
    background: #fff;
    border-color: #2563eb;
    box-shadow: 0 0 0 3px #bfdbfe;
}

.input-area {
    min-height: 120px;
    resize: vertical;
}

/* Tombol */
.btn-submit {
    background: #2563eb;
    color: #fff;
    border: none;
    padding: 12px 20px;
    border-radius: 10px;
    cursor: pointer;
    font-size: 15px;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: .2s;
    font-weight: 600;
}

.btn-submit:hover {
    background: #1e40af;
}
</style>

</x-layoutAdmin>
