<!DOCTYPE html>
<html>
<head>
    <title>Pengurusan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="/">Pengurusan</a>
        <div>
            <a href="/pendaftar" class="btn btn-light btn-sm">Pendaftar</a>
            <a href="/daftarulang" class="btn btn-light btn-sm">Daftar Ulang</a>
            <a href="/pengurusan" class="btn btn-light btn-sm">Pengurusan</a>
        </div>
    </div>
</nav>

<div class="container">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @yield('content')
</div>

</body>
</html>
