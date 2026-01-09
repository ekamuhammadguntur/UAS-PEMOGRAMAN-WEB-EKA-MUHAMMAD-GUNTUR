@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <h3 class="mb-3">
        {{ isset($pendaftar) ? 'Edit Pendaftaran' : 'Input Pendaftaran' }}
    </h3>

    {{-- Form Tambah / Edit --}}
    <form method="POST" action="{{ isset($pendaftar) ? route('pendaftar.update', $pendaftar->id) : route('pendaftar.store') }}">
        @csrf
        @if(isset($pendaftar))
            @method('PUT')
        @endif

        <div class="mb-3">
            <label for="no_daftar" class="form-label">No Daftar</label>
            <input type="text" name="no_daftar" id="no_daftar" class="form-control" 
                   value="{{ $pendaftar->no_daftar ?? '' }}" required>
        </div>

        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" 
                   value="{{ $pendaftar->nama ?? '' }}" required>
        </div>

        <div class="mb-3">
            <label for="tanggal_daftar" class="form-label">Tanggal Daftar</label>
            <input type="date" name="tanggal_daftar" id="tanggal_daftar" class="form-control" 
                   value="{{ $pendaftar->tanggal_daftar ?? '' }}" required>
        </div>

        <button type="submit" class="btn btn-primary">
            {{ isset($pendaftar) ? 'Update' : 'Simpan' }}
        </button>

        @if(isset($pendaftar))
            <a href="{{ route('pendaftar.create') }}" class="btn btn-secondary">Batal</a>
        @endif
    </form>


</div>
@endsection
