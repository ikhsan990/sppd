<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use function terbilang;

class KwitansiController extends Controller
{
    /**
     * Generate and stream Kwitansi PDF berdasarkan ID Jadwal.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
public function cetakPdf($id)
{
    $jadwal = Jadwal::with(['pegawai', 'pengikut.pegawai', 'kegiatan']  )->findOrFail($id);

    $jmlHari = $jadwal->kegiatan->jml_hari ?? 1;

    $totalTransport = $jadwal->pegawai->transport_lokal * $jmlHari;
    foreach ($jadwal->pengikut as $pengikut) {
        $totalTransport += $pengikut->pegawai->transport_lokal * $jmlHari;
    }

    $terbilang = ucfirst(terbilang($totalTransport)) . " Rupiah";

    $pdf = Pdf::loadView('pdf.kwitansi', [
        'jadwal' => $jadwal,
        'totalTransport' => $totalTransport,
        'terbilang' => $terbilang,
        'jmlHari' => $jmlHari,
    ]);

    return $pdf->stream('kwitansi.pdf');
}
}
