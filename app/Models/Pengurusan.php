<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengurusan extends Model
{
    protected $table = 'pengurusan';

    protected $fillable = [
        'no_antrian',
        'no_daftar',
        'nama',
        'berkas',
        'status',
        'keterangan',
        'pembayaran'
    ];
     public $timestamps = false; 


    public function pendaftar()
    {
        return $this->belongsTo(
            Pendaftar::class,
            'no_daftar',
            'no_daftar'
        );
    }

    public function daftarUlang()
    {
        return $this->belongsTo(
            DaftarUlang::class,
            'no_antrian',
            'no_antrian'
        );
    }
}
