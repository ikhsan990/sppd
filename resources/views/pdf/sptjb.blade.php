<!DOCTYPE html>
<html lang="ID">
<head>
    <title>Export SPTJB PDF</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #000; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2>Rekapitulasi SPTJB</h2>
    <table>
        <thead>
            <tr>
                <th>Nomor SPT</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Selesai</th>
                <th>Kegiatan</th>
                <th>Pegawai</th>
                <th>Tujuan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($jadwals as $jadwal)
            <tr>
                <td>{{ $jadwal->nomor_spt }}</td>
                <td>{{ $jadwal->tanggal_mulai->format('Y-m-d') }}</td>
                <td>{{ $jadwal->tanggal_selesai->format('Y-m-d') }}</td>
                <td>{{ $jadwal->kegiatan->nama_kegiatan ?? '' }}</td>
                <td>{{ $jadwal->pegawai->nama ?? '' }}</td>
                <td>{{ $jadwal->tujuan }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
