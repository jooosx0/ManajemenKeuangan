<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Home</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            padding-top: 56px; /* Sesuaikan dengan tinggi navbar */
        }
        #offcanvasNavbar {
            width: 250px; /* Lebar kustom untuk offcanvas */
        }
        .offcanvas-body {
            display: flex;
            flex-direction: column;
            justify-content: space-between; /* Membuat ruang antara elemen */
            height: 100%; /* Memastikan offcanvas body mengisi tinggi penuh */
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <!-- Toggle button (Hamburger) -->
            <button class="navbar-toggler me-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <!-- Brand Logo -->
            <a class="navbar-brand ms-auto" href="#">
                <img src="{{ asset('images/logoputih.png') }}" alt="Logo" style="width: 70px; height: auto;">
            </a>
            
        </div>
    </nav>

    <!-- Offcanvas Menu -->
    <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <!-- Navigation Links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ url('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('pemasukan') }}">Pemasukan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('pengeluaran') }}">Pengeluaran</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('laporan') }}">Laporan</a>
                </li>
            </ul>
            <!-- Logout Form -->
            <div class="mt-auto"> <!-- mt-auto untuk mendorong tombol ke bawah -->
                <form class="d-inline" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="btn btn-primary" type="submit">Logout</button> <!-- w-100 untuk membuat tombol lebar penuh -->
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>