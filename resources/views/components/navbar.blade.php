<header class="navbar">

    <!-- KIRI -->
    <nav class="nav-left">
        <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">
            HOME
        </a>

        <a href="{{ route('catalog') }}" class="{{ request()->routeIs('catalog') ? 'active' : '' }}">
            CATALOG
        </a>

        <!-- 🔥 TOMBOL RIWAYAT -->
        @auth
        <a href="{{ route('riwayat') }}" class="{{ request()->routeIs('riwayat') ? 'active' : '' }}">
            <i class="fa-solid fa-clock-rotate-left" style="margin-right: 5px;"></i>
            RIWAYAT
        </a>
        @endauth
    </nav>

    <!-- LOGO -->
    <div class="logo">
        <img src="{{ asset('tema/img/logo.png') }}" alt="Logo Brand">
    </div>

    <!-- KANAN -->
    <nav class="nav-right">

        <!-- Account -->
        @guest
            <a href="{{ route('login') }}" class="{{ request()->routeIs('login') ? 'active' : '' }}">
                <i class="fa-solid fa-user" style="margin-right: 5px;"></i>
                ACCOUNT
            </a>
        @endguest

        @auth
            <a href="#" onclick="document.getElementById('logoutForm').submit()">
                <i class="fa-solid fa-user" style="margin-right: 5px;"></i>
                LOGOUT
            </a>
        @endauth

        <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">
            <i class="fa-solid fa-envelope" style="margin-right: 5px;"></i>
            CONTACT
        </a>
    </nav>

    <form id="logoutForm" method="POST" action="{{ route('logout') }}" style="display:none;">
        @csrf
    </form>

</header>
