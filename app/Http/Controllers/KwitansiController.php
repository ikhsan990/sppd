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
    $jadwal = Jadwal::with(['pegawai', 'pengikut.pegawai'])->findOrFail($id);

    $totalTransport = $jadwal->pegawai->transport_lokal;
    foreach ($jadwal->pengikut as $pengikut) {
        $totalTransport += $pengikut->pegawai->transport_lokal;
    }

     $terbilang = ucfirst(terbilang($totalTransport)) . " Rupiah";

    $pdf = Pdf::loadView('pdf.kwitansi', [
        'jadwal' => $jadwal,
        'totalTransport' => $totalTransport,
        'terbilang' => $terbilang,
    ]);

    return $pdf->stream('kwitansi.pdf');
}
}
