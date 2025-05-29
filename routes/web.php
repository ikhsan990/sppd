<?php

use App\Models\Jadwal;
use App\Exports\SptjbExport;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SPTController;
use App\Http\Controllers\SppdController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\KwitansiController;
use Maatwebsite\Excel\Facades\Excel;



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

Route::get('/filament/sptjb/export-excel', function () {
    return Excel::download(new SptjbExport, 'rekap_sptjb_' . now()->format('Ymd_His') . '.xlsx');
})->name('filament.resources.sptjb.export-excel')->middleware(['auth', 'signed']);

Route::get('/filament/sptjb/export-pdf', function () {
    $jadwals = Jadwal::with(['kegiatan', 'pegawai'])->get();
    $pdf = Pdf::loadView('exports.sptjb', compact('jadwals'));
    return $pdf->download('rekap_sptjb_' . now()->format('Ymd_His') . '.pdf');
})->name('filament.resources.sptjb.export-pdf')->middleware(['auth', 'signed']);
