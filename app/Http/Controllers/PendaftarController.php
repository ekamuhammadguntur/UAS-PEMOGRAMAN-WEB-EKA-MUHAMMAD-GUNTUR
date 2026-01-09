<?php

namespace App\Http\Controllers;

use App\Models\Pendaftar;
use Illuminate\Http\Request;

class PendaftarController extends Controller
{

    public function index()
    {
        $pendaftar = Pendaftar::all();
        return view('pendaftar.index', compact('pendaftar'));
    }
    public function create()
    {
        $pendaftar_all = Pendaftar::all(); 
        return view('pendaftar.create', compact('pendaftar_all'));
    }

    public function store(Request $request)
    {
        Pendaftar::create([
            'no_daftar' => $request->no_daftar,
            'nama' => $request->nama,
            'tanggal_daftar' => $request->tanggal_daftar,
            'hari' => date('l'),
            'tanggal' => date('Y-m-d'),  
            'jam' => date('H:i:s')
        ]);

        return redirect()->route('pendaftar.index')->with('success', 'Data berhasil ditambahkan!');
    }

    // EDIT FORM
    public function edit($id)
    {
        $pendaftar = Pendaftar::findOrFail($id);   // data yang mau diedit
        $pendaftar_all = Pendaftar::all();         // data semua untuk tabel
        return view('pendaftar.create', compact('pendaftar', 'pendaftar_all'));
    }

    // UPDATE - simpan perubahan data
    public function update(Request $request, $id)
    {
        $pendaftar = Pendaftar::findOrFail($id);
        $pendaftar->update([
            'no_daftar' => $request->no_daftar,
            'nama' => $request->nama,
            'tanggal_daftar' => $request->tanggal_daftar,
            'hari' => date('l'),
            'tanggal' => date('Y-m-d'),
            'jam' => date('H:i:s')
        ]);

        return redirect()->route('pendaftar.index')->with('success', 'Data berhasil diperbarui!');
    }

    // DELETE - hapus data
    public function destroy($id)
    {
        Pendaftar::findOrFail($id)->delete();
        return redirect()->route('pendaftar.index')->with('success', 'Data berhasil dihapus!');
    }
}
