<!DOCTYPE html>
<html>
<head>
    <title>Pengajuan Paspor</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container my-5">

    <!-- HEADER -->
    <div class="card text-center shadow-sm mb-4">
        <div class="card-body bg-primary text-white rounded-3">
            <h2 class="fw-bold mb-2">PENGAJUAN PASPOR</h2>
            <p class="mb-1">Kantor Imigrasi Cabang</p>
            <small class="text-light">Programmer: Eka Muhammad Guntur</small>
        </div>
    </div>

    <!-- MENU NAVIGASI -->
<div class="d-flex justify-content-center mb-4">
    <div class="btn-group" role="group" aria-label="Menu Navigasi">
        <a href="{{ route('pendaftar.index') }}" 
           class="btn {{ request()->routeIs('pendaftar.index') ? 'btn-primary' : 'btn-outline-primary' }}">
           Pendaftar
        </a>
        <a href="{{ url('/daftarulang') }}" 
           class="btn {{ request()->is('daftarulang*') ? 'btn-success' : 'btn-outline-success' }}">
           Daftar Ulang
        </a>
        <a href="{{ url('/pengurusan') }}" 
           class="btn {{ request()->is('pengurusan*') ? 'btn-warning text-white' : 'btn-outline-warning' }}">
           Pengurusan
        </a>
    </div>
</div>

    <!-- CONTENT -->
    <div class="card shadow-sm p-4 bg-white rounded-3">
        @yield('content')
    </div>

</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
