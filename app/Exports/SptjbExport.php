<?php

namespace App\Exports;

use App\Models\Jadwal;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class SptjbExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        // Ambil data jadwal beserta relasi yang diperlukan
        return Jadwal::with(['kegiatan', 'pegawai', 'pengikut'])->get();
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
        ];
    }

    public function map($jadwal): array
    {
        return [
            $jadwal->nomor_spt,
            $jadwal->tanggal_mulai,
            $jadwal->tanggal_selesai,
            $jadwal->kegiatan->nama_kegiatan ?? '',
            $jadwal->pegawai->nama ?? '',
            $jadwal->tujuan,
        ];
    }
}
