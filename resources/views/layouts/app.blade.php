<!DOCTYPE html>
<html>
<head>
    <title>Pengajuan Paspor</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container my-4">

    <!-- HEADER -->
    <div class="text-center mb-4 p-4 bg-light rounded shadow-sm">
        <h2 class="fw-bold">PENGAJUAN PASPOR</h2>
        <p class="mb-1">Kantor Imigrasi Cabang</p>
        <p class="text-muted">Programmer : Eka Muhammad Guntur</p>
    </div>

    <!-- MENU NAVIGASI -->
    <nav class="mb-4">
        <div class="btn-group d-flex" role="group" aria-label="Menu Navigasi">
            <a href="{{ route('pendaftar.index') }}" class="btn btn-primary flex-fill">Pendaftar</a>
            <a href="{{ url('/daftarulang') }}" class="btn btn-success flex-fill">Daftar Ulang</a>
            <a href="{{ url('/pengurusan') }}" class="btn btn-warning flex-fill text-white">Pengurusan</a>
        </div>
    </nav>

    <!-- CONTENT -->
    <div class="card p-4 shadow-sm">
        @yield('content')
    </div>

</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
