<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DaftarUlang extends Model
{
    protected $table = 'daftar_ulang';
    public $timestamps = false;

    protected $fillable = [
        'no_daftar',
    'keperluan',
    'ktp',
    'kk',
    'ijazah_akte',
    'hari_datang',
    'tanggal_datang',
    'keterangan',
    'no_antrian',
    ];

    public function pendaftar()
    {
        return $this->belongsTo(
            Pendaftar::class,
            'no_daftar',
            'no_daftar'
        );
    }
}
