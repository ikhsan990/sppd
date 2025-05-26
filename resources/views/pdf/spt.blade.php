<!DOCTYPE html>
<html lang="ID">
<head>
    <meta charset="UTF-8">
    <title>SPT</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #000; padding: 6px; }
    </style>
</head>
<body>

<h2>Surat Perintah Tugas</h2>
<p><strong>Nomor SPT:</strong> {{ $jadwal->nomor_spt }}</p>
<p><strong>Nama Petugas:</strong> {{ $jadwal->pegawai->nama }}</p>
<p><strong>Tujuan:</strong> {{ $jadwal->tujuan }}</p>
<p><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($jadwal->tanggal_mulai)->format('d/m/Y') }} s/d {{ \Carbon\Carbon::parse($jadwal->tanggal_selesai)->format('d/m/Y') }}</p>

<p><strong>Kegiatan:</strong> {{ $jadwal->kegiatan->nama_kegiatan }}</p>
<p><strong>Keterangan:</strong> {{ $jadwal->kegiatan->keterangan }}</p>

@if ($jadwal->pengikuts->count())
    <h4>Pengikut:</h4>
    <ul>
        @foreach ($jadwal->pengikuts as $pengikut)
            <li>{{ $pengikut->pegawai->nama }}</li>
        @endforeach
    </ul>
@endif

</body>
</html>
