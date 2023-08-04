<style>
    body {
        background-color: #f0f0f0;
    }

    .navbar {
        background-color: #007bff;
        color: #ffffff;
    }

    .navbar-brand {
        font-weight: bold;
        color: #ffffff;
    }

    .navbar-nav .nav-link {
        color: #ffffff;
    }

    .navbar-nav .nav-link:hover {
        color: #f0f0f0;
    }

    /* Pindahkan tombol login ke ujung kanan */
    .login-button {
        margin-left: auto;
    }
</style>

<nav class="navbar navbar-expand-lg">
    <div class="container">

        <!-- Brand -->
        <a class="navbar-brand" href="{{ route('home') }}">Toko Dzann</a>

        <!-- Navbar items -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    @guest
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    @endguest
                </li>
                @auth
                    @if (auth()->user()->role == 'admin')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.dashboard') }}">Produk</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('pelanggan.keranjang') }}">Keranjang</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('pelanggan.summary') }}">Summary</a>
                        </li>
                    @endif
                @endauth
            </ul>
        </div>

        @guest
            <!-- Tampilkan jika belum login -->
            <a href="{{ route('loginPage') }}" class="btn btn-outline-light login-button">Login</a>
        @else
            <!-- Tampilkan jika sudah login -->
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-outline-light login-button">Logout</button>
            </form>
        @endguest

    </div>
</nav>
