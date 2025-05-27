<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;
use Barryvdh\DomPDF\Facade\Pdf;

class SPTController extends Controller
{
    public function cetak($id)
    {
        $jadwal = Jadwal::with(['pegawai', 'kegiatan', 'pengikut.pegawai'])->findOrFail($id);

        $pdf = Pdf::loadView('pdf.spt', compact('jadwal'))->setPaper('A4', 'portrait');

        return $pdf->stream('SPT-'.$jadwal->nomor_spt.'.pdf');
    }
}
