<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Pengikut;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class SppdController extends Controller
{
public function cetakPengikutAsn(Jadwal $jadwal, Request $request)
{
    $pengikutId = $request->query('pengikut_id');
    $pengikut = Pengikut::with('pegawai')->findOrFail($pengikutId);

    if ($pengikut->pegawai->status !== 'asn') {
        abort(403, 'Hanya pengikut ASN yang bisa dicetak.');
    }

    $pdf = Pdf::loadView('pdf.sppd_pengikut', [
        'jadwal' => $jadwal,
        'pengikut' => $pengikut,
    ]);

    return $pdf->stream('sppd-pengikut-' . $pengikut->pegawai->nama . '.pdf');
}
}
