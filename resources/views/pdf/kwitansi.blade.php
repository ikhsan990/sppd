<!DOCTYPE html>
<html lang="ID">
<head>
    <meta charset="utf-8">
    <title>Kwitansi {{ $jadwal->kegiatan->alias }}</title>
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
    h5 {
        text-align: center;
        margin-bottom: 10px;
    }
    p {
        font-size: 15px;
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
      font-size: 11px;
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
    <div style="text-align: center; font-weight: normal; margin-bottom: 10px; font-size: 14px;">NOMOR : 900/ {{ $jadwal->nomor_spt }} /KWIT/BOK/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/2025</div>

    <table style="border-collapse: collapse; border: none; font-size: 12px; text-wrap: wrap">
        <tbody style="border: none">
            <tr style="border: none">
                <td style="border: none; width: 20%" >Sudah terima dari</td>
                <td style="border: none">:</td>
                <td style=" border-collapse: collapse; border: none; text-wrap: wrap; width: 80%">Pengguna Anggaran Dinas Kesehatan Kabupaten Manokwari Atas Kegiatan Bantuan Operasional Kesehatan (BOK) Puskesmas Pulau Mansinam Tahun 2025</td>
            </tr>
            <tr style="border-collapse: collapse; border: none">
                <td style="border: none; width: 20%">Uang sejumlah</td>
                <td style="border: none">:</td>
                <td style=" border-collapse: collapse; border: none; width: 80%"><strong>Rp {{ number_format($totalTransport, 0, ',', '.') }}</strong></td>
            </tr >
            <tr style=" border-collapse: collapse; border: none">
                <td style="border: none; width: 20%">Untuk pembayaran</td>
                <td style="border: none">:</td>
                <td style=" border-collapse: collapse; border: none; text-wrap: wrap width: 80%">Biaya Perjalanan Dinas Petugas Dalam Rangka {{ $jadwal->kegiatan->nama_kegiatan }}  An. {{ $jadwal->pegawai->nama }} dkk. pada tanggal {{ \Carbon\Carbon::parse($jadwal->tanggal_mulai)->locale('id')->translatedFormat('d F Y') }} di Salobar (SPT & SPPD terlampir).</td>
            </tr>
        </tbody>
    </table>

    <table style="font-size: 14px; text-wrap: wrap; width: 70%; font-weight: bold; font-style: italic; border:#ffffff solid 0px; ">
        <tr style="border:#ffffff solid 01px; background-color:#d6d6d6">
            <td style="width: 15%; border:#ffffff solid 0px;" >Terbilang :</td>
            <td style="width: 55%; border:#ffffff solid 0px; ">{{ $terbilang }} </td>
        </tr>
    </table>


    <h5>RINCIAN BIAYA PERJALANAN DINAS</h5>

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
                <td colspan="4" style="font-weight: bold; text-align: center">JUMLAH</td>
                <td style="font-weight: bold">Rp {{ number_format($totalTransport, 0, ',', '.') }}</td>
                <td></td>
            </tr>
        </tbody>
    </table>


<table style="font-size: 12px; text-wrap: wrap; width: 100%; border:#ffffff solid 0px; ">
    <tr style="border:#ffffff solid 0px;">
        <td style="width: 30%; border:#ffffff solid 0px;"><br>Mengetahui,</td>
        <td style="width: 30%; border:#ffffff solid 0px;"></td>
        <td style="width: 30%; border:#ffffff solid 0px;">Manokwari, <br>Lunas Bayar,</td>
    </tr>
    <tr style="width: 30%; border:#ffffff solid 0px;">
        <td style="width: 30%; border:#ffffff solid 0px;">Kepala Puskesmas Pulau Mansinam <br><br><br><br><br><br><b>OKTOVIANUS SORBU, AMK</b><br>NIP. 19801030 200012 1 005</td>
        <td style="width: 30%; border:#ffffff solid 0px;"></td>
        <td style="width: 30%; border:#ffffff solid 0px;">Bendahara BOK <br><br><br><br><br><br><b>MUH. IKHSAN, AMK</b><br>NIP. 19900301 202106 1 001</td>
    </tr>

</table>

</body>
</html>
