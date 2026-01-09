@extends('layouts.app')

@section('content')
<div class="container">

<h5 class="fw-bold mb-3">Input Daftar Ulang</h5>

<form action="{{ route('daftarulang.store') }}" method="POST">
@csrf

<table class="table table-bordered align-middle">
<tr>
    <td width="25%">No. Daftar</td>
    <td>
        <select name="no_daftar" id="no_daftar" class="form-select" required>
            <option value="">-- Pilih No Daftar --</option>
            @foreach($data as $p)
                <option value="{{ $p->no_daftar }}"
                    data-nama="{{ $p->nama }}"
                    data-hari="{{ $p->hari }}"
                    data-tanggal="{{ $p->tanggal_daftar }}">
                    {{ $p->no_daftar }}
                </option>
            @endforeach
        </select>
    </td>
</tr>

<tr>
    <td>Nama Pemohon</td>
    <td><input type="text" id="nama_pemohon" class="form-control" readonly></td>
</tr>

<tr>
    <td>Hari Harus Datang</td>
    <td><input type="text" name="hari_harus_datang" id="hari_harus_datang" class="form-control" readonly></td>
</tr>

<tr>
    <td>Tgl Harus Datang</td>
    <td><input type="text" name="tgl_harus_datang" id="tgl_harus_datang" class="form-control" readonly></td>
</tr>

<tr>
    <td>Hari Datang</td>
    <td><input type="text" name="hari_datang" id="hari_datang" class="form-control" readonly></td>
</tr>

<tr>
    <td>Tgl Datang</td>
    <td><input type="date" name="tanggal_datang" id="tanggal_datang" class="form-control" required></td>
</tr>

<tr>
    <td>Berkas</td>
    <td>
        <div class="d-flex gap-3">
            <select name="ktp" class="form-select form-select-sm">
                <option value="Ada">Ada</option>
                <option value="Tidak">Tidak</option>
            </select>
            <select name="kk" class="form-select form-select-sm">
                <option value="Ada">Ada</option>
                <option value="Tidak">Tidak</option>
            </select>
            <select name="ijazah_akte" class="form-select form-select-sm">
                <option value="Ada">Ada</option>
                <option value="Tidak">Tidak</option>
            </select>
        </div>
    </td>
</tr>

<tr>
    <td>Keperluan</td>
    <td>
        <select name="keperluan" class="form-select" required>
            <option value="">-- Pilih Keperluan --</option>
            <option value="Wisata">Wisata</option>
            <option value="Umroh">Umroh</option>
            <option value="Kerja">Kerja</option>
            <option value="Studi">Studi</option>
            <option value="Kunjungan Keluarga">Kunjungan Keluarga</option>
        </select>
    </td>
</tr>

<tr>
    <td colspan="2" class="text-center">
        <button class="btn btn-success px-5">Simpan</button>
    </td>
</tr>
</table>
</form>

<hr>

<h5 class="fw-bold mt-4">Data Pendaftar Ulang</h5>

<table class="table table-bordered text-center">
<thead>
<tr>
    <th>No</th>
    <th>No Daftar</th>
    <th>Nama</th>
    <th>Keperluan</th>
    <th>KTP</th>
    <th>KK</th>
    <th>Ijazah</th>
    <th>Keterangan</th>
    <th>No Antrian</th>
</tr>
</thead>
<tbody>
@foreach($data as $i => $row)
<tr>
    <td>{{ $i+1 }}</td>
    <td>{{ $row->no_daftar }}</td>
    <td>{{ $row->pendaftar->nama ?? '-' }}</td>
    <td>{{ $row->keperluan }}</td>
    <td>{{ $row->ktp }}</td>
    <td>{{ $row->kk }}</td>
    <td>{{ $row->ijazah_akte }}</td>
    <td>{{ $row->keterangan }}</td>
    <td>{{ $row->keterangan == 'OK' ? $row->no_antrian : '-' }}</td>

    <td class="d-flex justify-content-center gap-1">
        <a href="{{ route('daftarulang.edit', $row->id) }}"
           class="btn btn-sm btn-warning">
            Edit
        </a>

        <form action="{{ route('daftarulang.destroy', $row->id) }}"
              method="POST"
              onsubmit="return confirm('Yakin hapus data ini?')">
            @csrf
            @method('DELETE')
            <button class="btn btn-sm btn-danger">
                Hapus
            </button>
        </form>
    </td>
</tr>
@endforeach
</tbody>
</table>

</div>

<script>
document.getElementById('no_daftar').addEventListener('change', function(){
    const opt = this.options[this.selectedIndex];
    nama_pemohon.value = opt.dataset.nama || '';
    hari_harus_datang.value = opt.dataset.hari || '';
    tgl_harus_datang.value = opt.dataset.tanggal || '';
});

function hariIndo(tgl){
    const h = ['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'];
    return h[new Date(tgl).getDay()];
}

tanggal_datang.addEventListener('change', function(){
    hari_datang.value = hariIndo(this.value);
});
</script>
@endsection
