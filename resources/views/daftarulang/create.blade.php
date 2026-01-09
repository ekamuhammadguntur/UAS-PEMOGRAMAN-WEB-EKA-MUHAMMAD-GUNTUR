@extends('layouts.app')

@section('content')
<div class="container mt-4">

<h4 class="mb-3">
    {{ isset($daftarUlang) ? 'Edit Daftar Ulang' : 'Input Daftar Ulang' }}
</h4>

<form method="POST"
      action="{{ isset($daftarUlang)
            ? route('daftarulang.update', $daftarUlang->id)
            : route('daftarulang.store') }}">
    @csrf
    @isset($daftarUlang)
        @method('PUT')
    @endisset

    <table class="table table-bordered align-middle">

        <!-- No Daftar -->
        <tr>
            <td width="30%">No Daftar</td>
            <td>
                @if(isset($daftarUlang))
                    <input type="text" name="no_daftar" class="form-control" 
                           value="{{ $daftarUlang->no_daftar }}" readonly>
                @else
                    <select name="no_daftar" id="no_daftar" class="form-select" required>
                        <option value="">-- Pilih --</option>
                        @foreach($pendaftar as $p)
                            <option value="{{ $p->no_daftar }}"
                                data-nama="{{ $p->nama }}"
                                data-hari="{{ $p->hari }}"
                                data-tanggal="{{ $p->tanggal }}">
                                {{ $p->no_daftar }}
                            </option>
                        @endforeach
                    </select>
                @endif
            </td>
        </tr>

        <!-- Nama Pemohon -->
        <tr>
            <td>Nama Pemohon</td>
            <td>
                <input type="text" name="nama" id="nama_pemohon" class="form-control"
                       value="{{ $daftarUlang->pendaftar->nama ?? '' }}"
                       {{ isset($daftarUlang) ? '' : 'readonly' }}>
            </td>
        </tr>

        <!-- Hari Datang -->
        <tr>
            <td>Hari Datang</td>
            <td>
                <input type="text" name="hari_datang" id="hari_datang" class="form-control"
                       value="{{ $daftarUlang->hari_datang ?? '' }}" readonly>
            </td>
        </tr>

        <!-- Tanggal Datang -->
        <tr>
            <td>Tanggal Datang</td>
            <td>
                <input type="date" name="tanggal_datang" id="tanggal_datang" class="form-control"
                       value="{{ $daftarUlang->tanggal_datang ?? '' }}" required>
            </td>
        </tr>

        <!-- Berkas -->
        <tr>
            <td>Berkas</td>
            <td class="d-flex gap-2">
                <select name="ktp" class="form-select">
                    <option value="Ada" {{ ($daftarUlang->ktp ?? '') == 'Ada' ? 'selected' : '' }}>Ada</option>
                    <option value="Tidak" {{ ($daftarUlang->ktp ?? '') == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                </select>

                <select name="kk" class="form-select">
                    <option value="Ada" {{ ($daftarUlang->kk ?? '') == 'Ada' ? 'selected' : '' }}>Ada</option>
                    <option value="Tidak" {{ ($daftarUlang->kk ?? '') == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                </select>

                <select name="ijazah_akte" class="form-select">
                    <option value="Ada" {{ ($daftarUlang->ijazah_akte ?? '') == 'Ada' ? 'selected' : '' }}>Ada</option>
                    <option value="Tidak" {{ ($daftarUlang->ijazah_akte ?? '') == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                </select>
            </td>
        </tr>

        <!-- Keperluan -->
        <tr>
            <td>Keperluan</td>
            <td>
                <select name="keperluan" class="form-select" required>
                    @foreach(['Wisata','Umroh','Kerja','Studi','Kunjungan Keluarga'] as $k)
                        <option value="{{ $k }}" 
                            {{ ($daftarUlang->keperluan ?? '') == $k ? 'selected' : '' }}>
                            {{ $k }}
                        </option>
                    @endforeach
                </select>
            </td>
        </tr>

        <!-- Tombol -->
        <tr>
            <td colspan="2" class="text-center">
                <button class="btn btn-success px-5">
                    {{ isset($daftarUlang) ? 'Update' : 'Simpan' }}
                </button>
                <a href="{{ route('daftarulang.index') }}" class="btn btn-secondary">Batal</a>
            </td>
        </tr>

    </table>
</form>
</div>

<script>
const noDaftar = document.getElementById('no_daftar');
const nama = document.getElementById('nama_pemohon');
const hariDatang = document.getElementById('hari_datang');
const tglDatang = document.getElementById('tanggal_datang');

function hariIndo(tgl) {
    const h = ['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'];
    return h[new Date(tgl).getDay()];
}

if(tglDatang) {
    tglDatang.addEventListener('change', function () {
        hariDatang.value = hariIndo(this.value);
    });
}


if(noDaftar) {
    noDaftar.addEventListener('change', function () {
        const opt = noDaftar.options[noDaftar.selectedIndex];
        nama.value = opt.dataset.nama || '';
        hariDatang.value = opt.dataset.hari || '';
        if(tglDatang) tglDatang.value = opt.dataset.tanggal || '';
    });
}
</script>
@endsection
