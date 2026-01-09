<?php

namespace App\Http\Controllers;

use App\Models\DaftarUlang;
use App\Models\Pendaftar;
use Illuminate\Http\Request;

class DaftarUlangController extends Controller
{
    public function index()
{
    $pendaftar = Pendaftar::orderBy('no_daftar')->get();

    $data = DaftarUlang::with('pendaftar')
        ->orderBy('id', 'desc')
        ->get();

    return view('daftarulang.index', compact('pendaftar', 'data'));
}


    public function create()
    {
        $pendaftar = Pendaftar::orderBy('no_daftar')->get();
        return view('daftarulang.create', compact('pendaftar'));
    }

  
    public function edit($id)
    {
        $pendaftar = Pendaftar::orderBy('no_daftar')->get();
        $edit = DaftarUlang::findOrFail($id);

        return view('daftarulang.create', compact('pendaftar','edit'));
    }

  
    public function store(Request $request)
    {
        $request->validate([
            'no_daftar'      => 'required',
            'keperluan'      => 'required',
            'ktp'            => 'required',
            'kk'             => 'required',
            'ijazah_akte'    => 'required',
            'hari_datang'    => 'required',
            'tanggal_datang' => 'required',
        ]);

        $pendaftar = Pendaftar::where('no_daftar', $request->no_daftar)->first();

        $keterangan = 'Tidak';
        $no_antrian = null;

        if ($pendaftar) {

            $maxAntrian = DaftarUlang::whereDate('tanggal_datang', $request->tanggal_datang)
                ->where('keterangan', 'OK')
                ->max('no_antrian');

            $nextAntrian = ($maxAntrian ?? 0) + 1;

            if (
                $request->ktp === 'Ada' &&
                $request->kk === 'Ada' &&
                $request->ijazah_akte === 'Ada' &&
                $pendaftar->hari === $request->hari_datang &&
                $pendaftar->tanggal === $request->tanggal_datang &&
                $nextAntrian <= 5
            ) {
                $keterangan = 'OK';
                $no_antrian = $nextAntrian;
            }
        }

        DaftarUlang::create([
            'no_daftar'      => $request->no_daftar,
            'keperluan'      => $request->keperluan,
            'ktp'            => $request->ktp,
            'kk'             => $request->kk,
            'ijazah_akte'    => $request->ijazah_akte,
            'hari_datang'    => $request->hari_datang,
            'tanggal_datang' => $request->tanggal_datang,
            'keterangan'     => $keterangan,
            'no_antrian'     => $no_antrian,
        ]);

        return redirect()->route('daftarulang.index')
            ->with('success', 'Data daftar ulang berhasil ditambahkan');
    }


    public function update(Request $request, $id)
    {
        $data = DaftarUlang::findOrFail($id);

        $data->update($request->only([
            'no_daftar',
            'keperluan',
            'ktp',
            'kk',
            'ijazah_akte',
            'hari_datang',
            'tanggal_datang',
        ]));

        return redirect()->route('daftarulang.index')
            ->with('success', 'Data berhasil diupdate');
    }


    public function destroy($id)
    {
        DaftarUlang::findOrFail($id)->delete();

        return redirect()->route('daftarulang.index')
            ->with('success', 'Data berhasil dihapus');
    }
}
