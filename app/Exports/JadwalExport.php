<?php

namespace App\Exports;

use App\Models\Jadwal;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class JadwalExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Jadwal::with(['pegawai', 'kegiatan', 'pengikuts'])
            ->get()
            ->map(function ($jadwal) {
                return [
                    'Nomor SPT' => $jadwal->nomor_spt,
                    'Tanggal Mulai' => $jadwal->tanggal_mulai,
                    'Tanggal Selesai' => $jadwal->tanggal_selesai,
                    'Kegiatan' => $jadwal->kegiatan->nama_kegiatan ?? '',
                    'Pegawai' => $jadwal->pegawai->nama ?? '',
                    'Tujuan' => $jadwal->tujuan,
                    'Jumlah Pengikut' => $jadwal->pengikuts->count(),
                ];
            });
    }

    public function headings(): array
    {
        return [
            'Nomor SPT',
            'Tanggal Mulai',
            'Tanggal Selesai',
            'Kegiatan',
            'Pegawai',
            'Tujuan',
            'Jumlah Pengikut',
        ];
    }
}
