<?php

use App\Models\Jadwal;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SPTController;
use App\Http\Controllers\SppdController;
use App\Http\Controllers\CetakKwitansiController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/jadwal/{jadwal}/cetak', function (Jadwal $jadwal) {
    $pdf = Pdf::loadView('pdf.jadwal', compact('jadwal'));
    return $pdf->stream('jadwal-' . $jadwal->id . '.pdf');
})->name('jadwal.cetak');

Route::get('/spt/cetak/{id}', [SPTController::class, 'cetak'])->name('spt.cetak');

Route::get('/kwitansi/{jadwal}', [CetakKwitansiController::class, 'cetak'])->name('kwitansi.cetak');

Route::get('/sppd/pengikut-asn/{jadwal}', [SppdController::class, 'cetakPengikutAsn'])->name('sppd.pengikut-asn.cetak');
