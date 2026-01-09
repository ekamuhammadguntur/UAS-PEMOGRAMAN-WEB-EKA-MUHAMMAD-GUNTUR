<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pendaftar extends Model
{
    protected $table = 'pendaftar';
    public $timestamps = false; 
    protected $fillable = [
        'no_daftar',
        'nama',
        'tanggal_daftar',
        'tanggal',
        'hari',
        'jam'
    ];

    
    public function daftarUlang()
    {
        return $this->hasOne(
            DaftarUlang::class, 
            'no_daftar',       
            'no_daftar'        
        );
    }
}
