<?php

use App\Models\Jadwal;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SPTController;
use App\Http\Controllers\SppdController;
use App\Http\Controllers\KwitansiController;
use App\Http\Controllers\KegiatanController;



Route::get('/', function () {
    return view ('welcome');
});
Route::get('/jadwal/{jadwal}/cetak', function (Jadwal $jadwal) {
    $customPaper = [0, 0, 595.35, 935.55];
    $pdf = Pdf::loadView('pdf.jadwal', compact('jadwal'))->setPaper($customPaper, 'portrait');
    return $pdf->stream('SPPD -' . $jadwal->kegiatan->alias .' '. \Carbon\Carbon::parse($jadwal->tanggal_mulai)->locale('id')->translatedFormat('d F Y') . '.pdf');
})->name('jadwal.cetak');

Route::get('/spt/cetak/{id}', [SPTController::class, 'cetak'])->name('spt.cetak');

Route::get('/kwitansi/{jadwal}', [KwitansiController::class, 'cetakPdf'])->name('kwitansi.cetak');


Route::get('/sppd/pengikut-asn/{jadwal}', [SppdController::class, 'cetakPengikutAsn'])->name('sppd.pengikut-asn.cetak');

