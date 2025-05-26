<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Barryvdh\DomPDF\Facade\Pdf;

class CetakKwitansiController extends Controller
{
    public function cetak(Jadwal $jadwal)
    {
        $pengikuts = $jadwal->pengikuts()->with('pegawai')->get();

        $pdf = Pdf::loadView('pdf.kwitansi', [
            'jadwal' => $jadwal,
            'pengikuts' => $pengikuts,
        ])->setPaper('A4', 'portrait');

        return $pdf->stream('kwitansi.pdf');
    }
}
