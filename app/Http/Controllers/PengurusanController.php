<?php

namespace App\Http\Controllers;

use App\Models\Pengurusan;
use App\Models\DaftarUlang;
use Illuminate\Http\Request;

class PengurusanController extends Controller
{

    public function index()
    {
        $data = Pengurusan::all();
        return view('pengurusan.index', compact('data'));
    }

  
    public function store()
    {
        $daftarOk = DaftarUlang::with('pendaftar')
            ->where('keterangan', 'OK')
            ->get();

        foreach ($daftarOk as $d) {
            $cek = Pengurusan::where('no_daftar', $d->no_daftar)
                ->where('no_antrian', $d->no_antrian)
                ->first();

            if (!$cek) {
                Pengurusan::create([
                    'no_antrian' => $d->no_antrian,
                    'no_daftar'  => $d->no_daftar,
                    'nama'       => $d->pendaftar->nama ?? '',
                    'berkas'     => 'Lengkap',
                    'status'     => 'Diterima',
                    'keterangan' => 'OK',
                    'pembayaran' => 355000
                ]);
            }
        }

        return redirect()->back()->with('success', 'Data pengurusan berhasil dibuat!');
    }


    public function destroy($id)
    {
        $data = Pengurusan::findOrFail($id);
        $data->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus!');
    }
}
