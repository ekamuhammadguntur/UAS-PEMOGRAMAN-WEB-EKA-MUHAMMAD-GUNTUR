@extends('layouts.app')

@section('content')

<div class="container">

  
    <h5 class="fw-bold mb-3">Input Pendaftaran</h5>

   
    <form method="POST" action="{{ route('pendaftar.store') }}" class="mb-4">
        @csrf

        <div class="row g-3">
            <div class="col-md-4">
                <label class="form-label">No Daftar</label>
                <input type="text" class="form-control" name="no_daftar" required>
            </div>

            <div class="col-md-4">
                <label class="form-label">Nama Pemohon</label>
                <input type="text" class="form-control" name="nama" required>
            </div>

            <div class="col-md-4">
                <label class="form-label">Tanggal Daftar</label>
                <input type="date" class="form-control" name="tanggal_daftar" required>
            </div>
        </div>

        <div class="mt-3">
            <small class="text-muted">
                <i>Hari, Tanggal & Jam kedatangan ditentukan otomatis oleh sistem</i>
            </small>
        </div>

        <button type="submit" class="btn btn-primary mt-3 px-4">
            Simpan
        </button>
    </form>

    <h5 class="fw-bold mb-3">Data Pendaftar</h5>

    <table class="table table-bordered table-striped align-middle text-center">
        <thead class="table-secondary">
            <tr>
                <th>No Daftar</th>
                <th>Nama Pemohon</th>
                <th>Tgl Daftar</th>
                <th>Hari</th>
                <th>Tanggal</th>
                <th>Jam</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pendaftar as $p)
                <tr>
                    <td>{{ $p->no_daftar }}</td>
                    <td>{{ $p->nama }}</td>

                    <td>{{ \Carbon\Carbon::parse($p->tanggal_daftar)->format('d-m-Y') }}</td>

                    <td>{{ $p->hari }}</td>

                    <td>{{ \Carbon\Carbon::parse($p->tanggal)->format('d-m-Y') }}</td>

                    <td>{{ $p->jam }}</td>

                    <td>
                        <a href="{{ route('pendaftar.edit', $p->id) }}"
                           class="btn btn-sm btn-warning">
                            Edit
                        </a>

                        <form action="{{ route('pendaftar.destroy', $p->id) }}"
                              method="POST"
                              class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger"
                                    onclick="return confirm('Hapus data?')">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">Belum ada data</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</div>

@endsection
