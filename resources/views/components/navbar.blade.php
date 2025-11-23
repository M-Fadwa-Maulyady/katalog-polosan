<header class="navbar">
    <nav class="nav-left">
        <a href="{{ route('home') }}">HOME</a>
        <a href="{{ route('catalog') }}">CATALOG</a>
    </nav>

    <div class="logo">
        <img src="{{ asset('tema/img/logo.png') }}" alt="Logo Brand">
    </div>

    <nav class="nav-right">
        <a href="{{ route('login') }}">ACCOUNT</a>
        <a href="{{ route('contact') }}">CONTACT</a>
    </nav>
</header>
