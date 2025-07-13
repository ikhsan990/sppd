<!DOCTYPE html>
<html lang="ID">
<head>
    <meta charset="utf-8">
    <title>Cetak Laporan</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        h1, h2, h3, h4 { margin-bottom: 10px; }
        .foto img {
            max-width: 200px;
            max-height: 200px;
            margin: 5px;
            border: 1px solid #ccc;
        }
        .section {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <h1>Laporan Kegiatan</h1>

    <div class="section">
        <strong>Nama Kegiatan:</strong> {{ $laporan->jadwal->nama_kegiatan ?? 'N/A' }}<br>
        <strong>Nomor SPT:</strong> {{ $laporan->jadwal->nomor_spt ?? 'N/A' }}<br>
        <strong>Tanggal Mulai:</strong> {{ $laporan->jadwal->tanggal_mulai ?? 'N/A' }}<br>
    </div>

    <div class="section">
        <h3>Hasil Kegiatan:</h3>
        <p>{{ $laporan->hasil_kegiatan }}</p>
    </div>

    <div class="section">
        <h3>Kesimpulan:</h3>
        <p>{{ $laporan->kesimpulan }}</p>
    </div>

    <div class="section">
        <h3>Saran:</h3>
        <p>{{ $laporan->saran }}</p>
    </div>

    <div class="section foto">
        <h3>Foto:</h3>
        @foreach($fotoUrls as $url)
            <img src="{{ $url }}" alt="Foto Laporan" />
        @endforeach
    </div>
</body>
</html>
