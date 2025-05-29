<!DOCTYPE html>
<html>
<head>
    <title>Rekapitulasi SPTJB</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 5px; text-align: left; }
        th { background-color: #f0f0f0; }
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
                <th>Jumlah Pengikut</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jadwals as $jadwal)
                <tr>
                    <td>{{ $jadwal->nomor_spt }}</td>
                    <td>{{ $jadwal->tanggal_mulai->format('d-m-Y') }}</td>
                    <td>{{ $jadwal->tanggal_selesai->format('d-m-Y') }}</td>
                    <td>{{ $jadwal->kegiatan->nama_kegiatan ?? '-' }}</td>
                    <td>{{ $jadwal->pegawai->nama ?? '-' }}</td>
                    <td>{{ $jadwal->tujuan }}</td>
                    <td>{{ $jadwal->pengikuts->count() }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
