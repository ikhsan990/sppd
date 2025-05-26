<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kwitansi</title>
    <style>
        body { font-family: "Times New Roman", serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; }
        .center { text-align: center; }
        .bordered th, .bordered td { border: 1px solid black; padding: 5px; }
        .signature-section { margin-top: 30px; }
    </style>
</head>
<body>

<div class="center">
    <img src="{{ public_path('logo-kabupaten.png') }}" height="60">
    <h4>PEMERINTAH KABUPATEN MANOKWARI<br>DINAS KESEHATAN<br>UPTD PUSKESMAS PULAU MANSINAM</h4>
    <small>Alamat: Jl. Lingkar Selatan Pulau Mansinam, Manokwari - Papua Barat</small>
</div>

<h3 class="center">KWITANSI</h3>
<p><strong>Nomor:</strong> {{ $jadwal->nomor_spt }}/KWIT/BOK/I/{{ now()->year }}</p>

<p><strong>Sudah terima dari:</strong> Pengguna Anggaran Dinas Kesehatan Kabupaten Manokwari...</p>
<p><strong>Uang sejumlah:</strong> Rp {{ number_format($pengikuts->count() * 150000, 0, ',', '.') }}</p>
<p><strong>Untuk pembayaran:</strong> Biaya Perjalanan Dinas Petugas dalam Rangka {{ $jadwal->kegiatan->nama_kegiatan }} An. {{ $jadwal->pegawai->nama }} dkk. Pada tanggal {{ $jadwal->tanggal_mulai }} di {{ $jadwal->tujuan }} (SPT & SPPD Terlampir)</p>

<p><em><strong>Terbilang:</strong> {{ ucwords(terbilang($pengikuts->count() * 150000)) }} Rupiah</em></p>

<h4 class="center">RINCIAN BIAYA PERJALANAN DINAS</h4>
<table class="bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama / NIP</th>
            <th>Gol/Ruang</th>
            <th>Uraian</th>
            <th>Jumlah diterima</th>
            <th>Tanda Tangan</th>
        </tr>
    </thead>
    <tbody>
        @php $total = 0; @endphp
        @foreach ($pengikuts as $i => $pengikut)
            @php
                $pegawai = $pengikut->pegawai;
                $jumlah = 150000; // Contoh nominal
                $total += $jumlah;
            @endphp
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $pegawai->nama }}<br>{{ $pegawai->nip }}</td>
                <td>{{ $pegawai->golongan }}</td>
                <td>1 OH × 150000</td>
                <td>Rp {{ number_format($jumlah, 0, ',', '.') }}</td>
                <td></td>
            </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td colspan="4" class="center"><strong>Jumlah</strong></td>
            <td><strong>Rp {{ number_format($total, 0, ',', '.') }}</strong></td>
            <td></td>
        </tr>
    </tfoot>
</table>

<div class="signature-section">
    <div style="float: left; width: 50%; text-align: center;">
        Mengetahui:<br>
        Kepala Puskesmas Pulau Mansinam<br><br><br>
        <strong><u>OKTOVIANUS SORBU, AMK</u></strong><br>
        NIP. 19801030 200012 1 005
    </div>
    <div style="float: right; width: 50%; text-align: center;">
        Manokwari,<br>
        Lunas dibayar<br>
        Bendahara BOK<br><br><br>
        <strong><u>MUH. IKHSAN, AMK</u></strong><br>
        NIP. 19900301 202106 1 001
    </div>
</div>

</body>
</html>
