<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    
    <!-- ICON -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        body {
            display: flex;
            background: #f5f6fa;
        }

        /* SIDEBAR */
        .sidebar {
            width: 260px;
            background: #111827;
            color: #fff;
            height: 100vh;
            padding: 25px 20px;
            position: fixed;
            left: 0;
            top: 0;
            display: flex;
            flex-direction: column;
        }

        .sidebar h2 {
            font-size: 22px;
            text-align: center;
            margin-bottom: 25px;
            letter-spacing: 1px;
            color: #f9fafb;
        }

        .side-menu {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .side-menu a {
            text-decoration: none;
            color: #d1d5db;
            padding: 12px 15px;
            font-size: 15px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            gap: 12px;
            transition: 0.25s ease;
        }

        .side-menu a:hover {
            background: #1f2937;
            color: #fff;
            transform: translateX(5px);
        }

        .side-menu .active {
            background: #2563eb;
            color: #fff;
        }

        /* MAIN CONTENT */
        .main {
            margin-left: 260px;
            width: calc(100% - 260px);
        }

        /* TOP NAVBAR */
        .topbar {
            background: #fff;
            padding: 15px 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
            position: sticky;
            top: 0;
            z-index: 10;
        }

        .topbar .title {
            font-size: 20px;
            font-weight: 600;
            color: #1f2937;
        }

        .profile-area {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .profile-area img {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #ddd;
        }

        .profile-area span {
            font-size: 15px;
            font-weight: 500;
            color: #374151;
        }

        /* CONTENT */
        .content {
            padding: 25px;
            min-height: calc(100vh - 70px);
        }
    </style>
</head>

<body>

    <!-- SIDEBAR -->
 <div class="sidebar">
    <h2 class="sidebar-title">Admin Panel</h2>

    <div class="side-menu">

        <a href="{{ route('admin.dashboard') }}"
           class="side-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <i class="fa-solid fa-house"></i>
            <span>Dashboard</span>
        </a>

        <a href="{{ route('admin.datacatalog.index') }}"
           class="side-item {{ request()->routeIs('admin.datacatalog*') ? 'active' : '' }}">
            <i class="fa-solid fa-book"></i>
            <span>Catalog</span>
        </a>

        <a href="{{ route('admin.dataAnggota') }}"
           class="side-item {{ request()->routeIs('admin.dataAnggota') ? 'active' : '' }}">
            <i class="fa-solid fa-user"></i>
            <span>User</span>
        </a>

        <a href="{{ route('admin.orders') }}"
           class="side-item {{ request()->routeIs('admin.orders') ? 'active' : '' }}">
            <i class="fa-solid fa-receipt"></i>
            <span>Orders</span>
        </a>

    </div>
</div>


    <!-- MAIN -->
    <div class="main">

        <!-- NAVBAR ATAS -->
        <div class="topbar">
            <div class="title">@yield('title')</div>

            <div class="profile-area">
                <span>Admin</span>
                <img src="{{ asset('tema/img/profile.jpg') }}" alt="profile">
            </div>
        </div>

        <!-- HALAMAN -->
        <div class="content">
            {{ $slot }}
        </div>
    </div>

</body>
</html>
