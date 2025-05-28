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
        $customPaper = [0, 0, 595.35, 935.55];
        $pdf = Pdf::loadView('pdf.spt', compact('jadwal'))->setPaper($customPaper, 'portrait');

        return $pdf->stream('SPT-'.$jadwal->nomor_spt.'.pdf');
    }
}
