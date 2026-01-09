@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <h4 class="fw-bold mb-3">Data Pengurusan Paspor</h4>

    {{-- tombol proses pengurusan --}}
    <form action="{{ route('pengurusan.store') }}" method="POST" class="mb-3">
        @csrf
        <button class="btn btn-primary"
            onclick="return confirm('Proses semua data daftar ulang yang OK?')">
            Proses Pengurusan
        </button>
    </form>

    <table class="table table-bordered text-center align-middle">
        <thead class="table-light">
            <tr>
                <th>No</th>
                <th>No Antrian</th>
                <th>No Daftar</th>
                <th>Nama Pemohon</th>
                <th>Berkas</th>
                <th>Status</th>
                <th>Keterangan</th>
                <th>Pembayaran</th>
            </tr>
        </thead>
        <tbody>
            @php $total = 0; @endphp

            @forelse($data as $i => $row)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $row->no_antrian }}</td>
                    <td>{{ $row->no_daftar }}</td>
                    <td>{{ $row->nama }}</td>
                    <td>{{ $row->berkas }}</td>
                    <td>{{ $row->status }}</td>
                    <td>{{ $row->keterangan }}</td>
                    <td>
                        Rp {{ number_format($row->pembayaran, 0, ',', '.') }}
                    </td>
                </tr>

                @php
                    $total += $row->pembayaran;
                @endphp
            @empty
                <tr>
                    <td colspan="8">Belum ada data pengurusan</td>
                </tr>
            @endforelse
        </tbody>

        {{-- total pendapatan --}}
        <tfoot class="table-light">
            <tr>
                <th colspan="7" class="text-end">Total Pendapatan</th>
                <th>
                    Rp {{ number_format($total, 0, ',', '.') }}
                </th>
            </tr>
        </tfoot>
    </table>

</div>
@endsection
