<x-layoutAdmin title="Dashboard">

    <div class="dashboard-cards">

        <!-- CARD: TOTAL USER -->
        <div class="card">
            <div class="card-icon user">
                <i class="fa-solid fa-users"></i>
            </div>
            <div class="card-info">
                <h3>Total User</h3>
                <p>125</p>
            </div>
        </div>

        <!-- CARD: TOTAL CATALOG -->
        <div class="card">
            <div class="card-icon catalog">
                <i class="fa-solid fa-book"></i>
            </div>
            <div class="card-info">
                <h3>Total Catalog</h3>
                <p>89</p>
            </div>
        </div>

        <!-- CARD: TOTAL TRANSAKSI -->
        <div class="card">
            <div class="card-icon transaksi">
                <i class="fa-solid fa-receipt"></i>
            </div>
            <div class="card-info">
                <h3>Total Transaksi</h3>
                <p>342</p>
            </div>
        </div>

        <!-- CARD TAMBAHAN (RA PILIHKAN) : BUKU DIPINJAM -->
        <div class="card">
            <div class="card-icon pinjam">
                <i class="fa-solid fa-arrow-up-right-from-square"></i>
            </div>
            <div class="card-info">
                <h3>Selesai</h3>
                <p>57</p>
            </div>
        </div>

    </div>

    <!-- STYLE UNTUK CARD -->
    <style>
        .dashboard-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .card {
            background: #ffffff;
            border-radius: 14px;
            padding: 20px;
            display: flex;
            align-items: center;
            gap: 15px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.06);
            transition: 0.2s;
        }

        .card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 15px rgba(0,0,0,0.08);
        }

        .card-icon {
            width: 55px;
            height: 55px;
            border-radius: 12px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 26px;
            color: #fff;
        }

        .card-info h3 {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 4px;
        }

        .card-info p {
            font-size: 22px;
            font-weight: 700;
            color: #111;
        }

        /* WARNA IKON */
        .card-icon.user { background: #2563eb; }
        .card-icon.catalog { background: #10b981; }
        .card-icon.transaksi { background: #f59e0b; }
        .card-icon.pinjam { background: #ef4444; }
    </style>

</x-layoutAdmin>
