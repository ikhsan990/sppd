<?php

namespace App\Http\Controllers;

use App\Models\Belanja;
use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class BelanjaController extends Controller
{
 /**
     * Menampilkan kwitansi belanja sesuai ID dan generate PDF.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function cetak($id)
    {
        // Ambil data belanja berdasarkan id, jika tidak ditemukan error 404
        $belanja = Belanja::findOrFail($id);

        // Ambil jumlah dan harga, default jika null
        $jumlah = $belanja->jumlah ?? 1;
        $harga = $belanja->harga ?? 0;

        // Hitung total belanja
        $total_belanja = $harga * $jumlah;

        // Fungsi terbilang untuk mengubah angka ke kata (pastikan Anda punya fungsi ini)
        $terbilang = ucfirst(terbilang($total_belanja)) . " Rupiah";

        // Set ukuran kertas custom untuk PDF
        $customPaper = [0, 0, 595.35, 935.55];

        // Load view 'belanja.cetak' dan kirim data
        $pdf = PDF::loadView('belanja.cetak', [
            'belanja' => $belanja,
            'total_belanja' => $total_belanja,
            'terbilang' => $terbilang,
        ])->setPaper($customPaper, 'portrait');

        // Tampilkan file PDF di browser (atau bisa download)
        return $pdf->stream('kwitansi_belanja_' . $id . '.pdf');
    }

}
