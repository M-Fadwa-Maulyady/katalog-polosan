<x-layoutAdmin title="Edit Anggota">

<div class="container-center">

    <!-- HEADER -->
    <div class="header-title">
        <h1>Edit Anggota</h1>
        <p>Perbarui informasi anggota dengan benar.</p>
    </div>

    <!-- ALERT ERROR -->
    @if ($errors->any())
        <div class="alert-error">
            <ul>
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- ALERT SUCCESS -->
    @if(session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- CARD FORM -->
    <div class="form-card">

        <form action="{{ route('admin.updateAnggota', $anggota->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- NAMA -->
            <div class="form-group">
                <label>Nama <span>*</span></label>
                <input type="text" name="name" class="input-field"
                       value="{{ old('name', $anggota->name) }}">
            </div>

            <!-- EMAIL -->
            <div class="form-group">
                <label>Email <span>*</span></label>
                <input type="email" name="email" class="input-field"
                       value="{{ old('email', $anggota->email) }}">
            </div>

            <!-- ALAMAT -->
            <div class="form-group">
                <label>Alamat <span>*</span></label>
                <input type="text" name="alamat" class="input-field"
                       value="{{ old('alamat', $anggota->alamat) }}">
            </div>

            <!-- NO TELP -->
            <div class="form-group">
                <label>No. Telp <span>*</span></label>
                <input type="text" name="no_telp" class="input-field"
                       value="{{ old('no_telp', $anggota->no_telp) }}">
            </div>

            <!-- PASSWORD -->
            <div class="form-group">
                <label>Password (Kosongkan jika tidak ingin mengubah)</label>
                <input type="password" name="password" class="input-field" placeholder="Isi jika ingin mengubah password">
            </div>

            <!-- KONFIRMASI PASSWORD -->
            <div class="form-group">
                <label>Konfirmasi Password</label>
                <input type="password" name="password_confirmation" class="input-field">
            </div>

            <!-- BUTTONS -->
            <div class="button-row">
                <button type="submit" class="btn-submit">
                    <i class="fa-solid fa-save"></i> Update Anggota
                </button>

                <a href="{{ route('admin.dataAnggota') }}" class="btn-cancel">
                    Kembali
                </a>
            </div>

        </form>

    </div>
</div>


<style>
/* Container Utama */
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

/* Alert Error */
.alert-error {
    background: #fee2e2;
    border: 1px solid #fecaca;
    padding: 15px;
    border-radius: 10px;
    margin-bottom: 20px;
    color: #991b1b;
    font-size: 14px;
}
.alert-error ul {
    margin: 0;
    padding-left: 18px;
}

/* Alert Success */
.alert-success {
    background: #d1fae5;
    border: 1px solid #a7f3d0;
    padding: 15px;
    border-radius: 10px;
    margin-bottom: 20px;
    color: #065f46;
}

/* Card */
.form-card {
    background: #ffffff;
    padding: 30px;
    border-radius: 16px;
    box-shadow: 0 8px 22px rgba(0, 0, 0, 0.06);
}

/* Form Group */
.form-group {
    margin-bottom: 20px;
    display: flex;
    flex-direction: column;
}
.form-group label {
    font-size: 14px;
    font-weight: 600;
    margin-bottom: 6px;
}
.form-group label span {
    color: #ef4444;
}

/* Input */
.input-field {
    padding: 12px 15px;
    border-radius: 10px;
    border: 1px solid #d1d5db;
    background: #f9fafb;
    transition: .2s ease;
    font-size: 15px;
}

.input-field:focus {
    background: #fff;
    border-color: #2563eb;
    box-shadow: 0 0 0 3px #bfdbfe;
}

/* Button Group */
.button-row {
    margin-top: 25px;
    display: flex;
    gap: 10px;
}

/* Tombol Simpan */
.btn-submit {
    background: #2563eb;
    color: white;
    padding: 12px 20px;
    border: none;
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

/* Tombol Kembali */
.btn-cancel {
    padding: 12px 20px;
    background: #6b7280;
    color: white;
    border-radius: 10px;
    text-decoration: none;
    font-size: 15px;
    transition: .2s;
}
.btn-cancel:hover {
    background: #4b5563;
}
</style>

</x-layoutAdmin>
