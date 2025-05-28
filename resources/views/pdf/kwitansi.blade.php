<!DOCTYPE html>
<html lang="ID">
<head>
    <meta charset="utf-8">
    <title>Kwitansi</title>
    <style>
        body { font-family: "Times New Roman", Times, serif; font-size: 12px; line-height: 1.4; }
        table { width: 100%; }
        th, td { border: 0px solid black; padding: 5px; text-align: center; }
        .header, .footer { text-align: center; line-height: 1.4; }
        .bold { font-weight: bold; }
    </style>
</head>
<body>
    <div class="header">
    <table style="width: 100%; text-align: center; border-collapse: collapse; border: none; border-bottom: 2px solid #000;">
    <tr>
        <td style="width: 20%; border: none;">
            <img src="logo_pemda.png" alt="Logo Kabupaten Manokwari" style="max-height: 70px; display: block; margin: 0 auto;">
        </td>
        <td style="width: 60%; text-align: center; border: none;">
            <div style="font-weight: bold; font-size: 16px;">PEMERINTAH KABUPATEN MANOKWARI</div>
            <div style="font-weight: bold; font-size: 18px;">DINAS KESEHATAN</div>
            <div style="font-weight: bold; font-size: 20px;">UPTD PUSKESMAS PULAU MANSINAM</div>
            <div style="font-size: 12px; font-style: italic;">Alamat: Jl. Lingkar Selatan Pulau Mansinam, Manokwari - Papua Barat</div>
        </td>
        <td style="width: 20%; border: none;">
            <img src="logo_pkm.png" alt="Logo Puskesmas" style="max-height: 70px; display: block; margin: 0 auto;">
        </td>
    </tr>
    </table>


        <h2>KWITANSI</h2>
        <p>Nomor : 900 / 035 / KWIT/BOK/I/2025</p>
    </div>

    <p>Sudah terima dari : Pengguna Anggaran Dinas Kesehatan Kabupaten Manokwari Atas Kegiatan Bantuan Operasional Kesehatan (BOK) Puskesmas Pulau Mansinam Tahun 2025</p>
    <p>Uang sejumlah : <strong>Rp {{ number_format($totalTransport, 0, ',', '.') }}</strong></p>
    <p>Untuk pembayaran : Biaya Perjalanan Dinas Petugas Dalam Rangka {{ $jadwal->kegiatan->nama_kegiatan }} An. {{ $jadwal->pegawai->nama }} dkk. pada tanggal {{ \Carbon\Carbon::parse($jadwal->tanggal_mulai)->locale('id')->translatedFormat('d F Y') }} di Salobar (SPT & SPPD terlampir)</p>

    <hr>

    <p><em>Terbilang : {{ $terbilang }} </em></p>

    <h4>RINCIAN BIAYA PERJALANAN DINAS</h4>

    <table>
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
            {{-- Pegawai Penanggung Jawab --}}
            <tr>
                <td>1</td>
                <td>{{ $jadwal->pegawai->nama }}<br>{{ $jadwal->pegawai->nip }}</td>
                <td>{{ $jadwal->pegawai->pangkat }}</td>
                <td>{{ $jmlHari }} OH x {{ number_format($jadwal->pegawai->transport_lokal, 0, ',', '.') }}</td>
                <td>Rp {{ number_format($jadwal->pegawai->transport_lokal * $jmlHari, 0, ',', '.') }}</td>
                <td></td>
            </tr>

            {{-- Pengikut --}}
            @foreach($jadwal->pengikut as $index => $pengikut)
            <tr>
                <td>{{ $index + 2 }}</td>
                <td>{{ $pengikut->pegawai->nama }}<br>{{ $pengikut->pegawai->nip }}</td>
                <td>{{ $pengikut->pegawai->pangkat }}</td>
                <td>{{ $jmlHari }} OH x {{ number_format($pengikut->pegawai->transport_lokal , 0, ',', '.') }}</td>
                <td>Rp {{ number_format($pengikut->pegawai->transport_lokal * $jmlHari, 0, ',', '.') }}</td>
                <td></td>
            </tr>
            @endforeach

            {{-- Total --}}
            <tr>
                <td colspan="4" class="bold">Jumlah</td>
                <td class="bold">Rp {{ number_format($totalTransport, 0, ',', '.') }}</td>
                <td></td>
            </tr>
        </tbody>
    </table>

    <br><br>

    <div style="width: 50%; float: left; text-align: center;">
        <p>Mengetahui :<br>Kepala Puskesmas Pulau Mansinam</p>
        <br><br><br>
        <p><strong>OKTOVIANUS SORBU, AMK</strong><br>NIP. 19801030 200012 1 005</p>
    </div>

    <div style="width: 50%; float: right; text-align: center;">
        <p>Manokwari,<br>Lunas dibayar,<br>Bendahara BOK</p>
        <br><br><br>
        <p><strong>MUH. IKHSAN, AMK</strong><br>NIP. 19900301 202106 1 001</p>
    </div>

</body>
</html>
