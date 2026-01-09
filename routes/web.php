<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PendaftarController;
use App\Http\Controllers\DaftarUlangController;
use App\Http\Controllers\PengurusanController;

Route::get('/', function () {
    return redirect('/pendaftar');
});


Route::resource('pendaftar', PendaftarController::class);


Route::get('/daftarulang', [DaftarUlangController::class, 'index'])
    ->name('daftarulang.index');

Route::post('/daftarulang', [DaftarUlangController::class, 'store'])
    ->name('daftarulang.store');

Route::get('/daftarulang/{id}/edit', [DaftarUlangController::class, 'edit'])
    ->name('daftarulang.edit');

Route::put('/daftarulang/{id}', [DaftarUlangController::class, 'update'])
    ->name('daftarulang.update');

Route::delete('/daftarulang/{id}', [DaftarUlangController::class, 'destroy'])
    ->name('daftarulang.destroy');


    
Route::get('/pengurusan', [PengurusanController::class, 'index'])
    ->name('pengurusan.index');

Route::post('/pengurusan', [PengurusanController::class, 'store'])
    ->name('pengurusan.store');
