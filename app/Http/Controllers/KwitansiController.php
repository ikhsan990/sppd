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
     $customPaper = [0, 0, 595.35, 935.55];
    $pdf = Pdf::loadView('pdf.kwitansi', [
        'jadwal' => $jadwal,
        'totalTransport' => $totalTransport,
        'terbilang' => $terbilang,
        'jmlHari' => $jmlHari,
    ]) ->setPaper($customPaper, 'portrait');

    return $pdf->stream($jadwal->nomor_spt . '. Kwitansi - ' . $jadwal->kegiatan->alias . ' - ' . \Carbon\Carbon::parse($jadwal->tanggal_mulai)->locale('id')->translatedFormat('d F Y') . '.pdf');
}
}
