<!DOCTYPE html>
<html lang="ID">
<head>
    <meta charset="utf-8">
    <title>Kwitansi</title>
<style>
    body {
      font-family: "Times New Roman", Times, serif;
      margin: 5px;
      color: #000;
    }
    .page {
      width: 660px;
      margin: 0 auto 10px auto;
      padding: 5px;
      border: 0px solid #000;
      box-sizing: border-box;
    }
    h1, h2, h3 {
      margin: 0;
      padding: 0;
    }
    h1 {
      font-size: 18px;
      font-weight: bold;
      text-align: center;
      margin-bottom: 5px;
    }
    h2 {
      font-size: 16px;
      font-weight: bold;
      text-align: center;
      margin-bottom: 15px;
      text-decoration: underline;
    }
    .header-info {
    display: flex;
    align-items: center;
    justify-content: space-between; /* Logo kiri dan kanan di ujung */
    padding: 10px 20px;
    border-bottom: 1px solid #000; /* Contoh garis bawah */
    }

    .header-info .logo-left,
    .header-info .logo-right {
        width: 100%; /* Atur ukuran logo sesuai kebutuhan */
        height: auto;
    }

    .header-info .header-center {
    flex-grow: 1;
    text-align: center;
    font-weight: bold;
    font-size: 18px;
    /* Bisa ditambah style lain sesuai kebutuhan */
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 10px;
      font-size: 12px;
    }
    table, th, td {
      border: 1px solid #000;
    }
    th, td {
      padding: 6px 8px;
      vertical-align: top;
    }
    th {
      text-align: center;
      font-weight: bold;
    }
    .no-border {
      border: none !important;
    }
    .signature-section {
      margin-top: 30px;
      font-size: 14px;
      line-height: 1.4;
    }
    .signature-name {
      font-weight: bold;
      margin-top: 60px;
      text-align: center;
      text-transform: uppercase;
    }
    .nip {
      text-align: center;
      font-size: 13px;
      margin-top: 2px;
    }
    .page-break {
      page-break-after: always;
    }
    .section-title {
      font-weight: bold;
      margin-top: 10px;
      margin-bottom: 10px;
      font-size: 13px;
    }
    .italic {
      font-style: italic;
    }
    .dashed-line {
      border-bottom: 1px dotted #000;
      width: 200px;
      margin: 5px 0;
    }
  </style>
</head>
<body>
    <div class="page" id="page1">

<div>
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
</div>

    <h2 style="text-align: center; font-weight: bold; font-size: 18px; margin-bottom: 5px; margin-top: 30px;">K W I T A N S I</h2>
    <div style="text-align: center; font-weight: normal; margin-bottom: 10px; font-size: 14px;">NOMOR : 900/ {{ $jadwal->nomor_spt }} /KWIT/BOK/___/2025</div>


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
                <td>{{ $jadwal->pegawai->pangkat }}/{{ $jadwal->pegawai->golongan }}</td>
                <td>{{ $jmlHari }} OH x {{ number_format($jadwal->pegawai->transport_lokal, 0, ',', '.') }}</td>
                <td>Rp {{ number_format($jadwal->pegawai->transport_lokal * $jmlHari, 0, ',', '.') }}</td>
                <td></td>
            </tr>

            {{-- Pengikut --}}
            @foreach($jadwal->pengikut as $index => $pengikut)
            <tr>
                <td>{{ $index + 2 }}</td>
                <td>{{ $pengikut->pegawai->nama }}<br>{{ $pengikut->pegawai->nip }}</td>
                <td>{{ $pengikut->pegawai->pangkat }}/{{ $pengikut->pegawai->golongan }}</td>
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
