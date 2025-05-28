<!DOCTYPE html>
<html lang="ID">
<head>
<meta charset="UTF-8" />
  <title>SPT {{ $jadwal->kegiatan->alias }}</title>
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
      margin-bottom: 5px;
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

<!-- HALAMAN 1 -->
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

        {{-- <img src="{{ asset('logo_pemda.png') }}" alt="Logo Kiri" class="logo-left" />
      <div style="text-align: center; font-weight: bold; margin-bottom: 1px; font-size: 16px;">PEMERINTAH KABUPATEN MANOKWARI</div>
      <div style="text-align: center; font-weight: bold; margin-bottom: 1px; font-size: 16px;">DINAS KESEHATAN</div>
      <div style="text-align: center; font-weight: bold; margin-bottom: 1px; font-size: 18px;">UPTD PUSKESMAS PULAU MANSINAM</div>
      <div style="margin-top: 5px; font-size: 13px; font-style: italic;">Alamat: Jl. Lingkar Selatan Pulau Mansinam, Manokwari - Papua Barat</div>
        <img src="{{ asset('logo_pkm.png') }}" alt="Logo Kanan" class="logo-right" />
      <hr style="border: 1px solid #000; margin: 0px 0;"> --}}
</div>
<br>

    <h2 style="text-align: center; font-weight: bold; margin-bottom: 5px;">SURAT PERINTAH TUGAS</h2>
    <div style="text-align: center; font-weight: normal; margin-bottom: 10px; font-size: 14px;">NOMOR : 800/ {{ $jadwal->nomor_spt }} /SPT/BOK/___/2025</div>

    <table style=" border:none;">
      <tbody>
        <tr style=" border:none;">
          <td style="text-align:center; border:none;">1.</td>
          <td style=" border:none;">Pejabat yang memberi perintah</td>
          <td style=" border:none;">:</td>
          <td style=" border:none;">Kepala Puskesmas Pulau Mansinam</td>
        </tr>
        <tr style=" border:none;">
          <td style="text-align:center; border:none;">2.</td>
          <td style=" border:none;">Pegawai yang diperintahkan</td>
          <td style=" border:none;">:</td>
          <td style=" border:none;"><strong>{{ $jadwal->pegawai->nama }}</strong></td>
        </tr>
        <tr style=" border:none;">
          <td style="text-align:center; border:none;">3.</td>
          <td style=" border:none;">NIP/NIPPK</td>
          <td style=" border:none;">:</td>
          <td style=" border:none;">{{ $jadwal->pegawai->nip }}</td>
        </tr>
        <tr style=" border:none;">
          <td style="text-align:center; border:none;">4.</td>
          <td style=" border:none;">Pangkat / Golongan</td>
          <td style=" border:none;">:</td>
          <td style=" border:none;">{{ $jadwal->pegawai->pangkat }} / {{ $jadwal->pegawai->golongan }}</td>
        </tr>
        <tr style=" border:none;">
          <td style="text-align:center; border:none;">5.</td>
          <td style=" border:none;">Jabatan</td>
          <td style=" border:none;">:</td>
          <td style=" border:none;">{{ $jadwal->pegawai->jabatan }}</td>
        </tr>
        <tr style=" border:none;">
          <td style="text-align:center; border:none;">6.</td>
          <td style=" border:none;">Maksud Perjalanan Dinas</td>
          <td style=" border:none;">:</td>
          <td style=" border:none;">{{ $jadwal->kegiatan->nama_kegiatan }}</td>
        </tr>
        <tr style=" border:none;">
          <td style="text-align:center; border:none;">7.</td>
          <td style=" border:none;">Angkutan yang dipergunakan</td>
          <td style=" border:none;">:</td>
          <td style=" border:none;">Angkutan Darat</td>
        </tr>
        <tr style=" border:none;">
          <td style="text-align:center; border:none;">8.</td>
          <td style=" border:none;">Tempat berangkat</td>
          <td style=" border:none;">:</td>
          <td style=" border:none;">Puskesmas Pulau Mansinam</td>
        </tr>
        <tr style=" border:none;">
          <td style="text-align:center; border:none;">9.</td>
          <td style=" border:none;">Tempat tujuan</td>
          <td style=" border:none;">:</td>
          <td style=" border:none;">{{ $jadwal->tujuan }}</td>
        </tr>
        <tr style=" border:none;">
          <td style="text-align:center; border:none;">10.</td>
          <td style=" border:none;">Lama Perjalanan Dinas</td>
          <td style=" border:none;">:</td>
          <td style=" border:none;">   @php
                    // Pastikan tanggal_mulai dan tanggal_selesai adalah objek Carbon
                    $tanggalMulai = \Carbon\Carbon::parse($jadwal->tanggal_mulai);
                    $tanggalSelesai = \Carbon\Carbon::parse($jadwal->tanggal_selesai);

                    // Hitung jumlah hari secara inklusif (termasuk tanggal mulai dan tanggal selesai)
                    $jumlahHari = $tanggalMulai->diffInDays($tanggalSelesai) + 1 ;
                    @endphp
                {{ $jumlahHari }} Hari
          </td>
        </tr>
        <tr style=" border:none;">
          <td style="text-align:center; border:none;">11.</td>
          <td style=" border:none;">Tanggal berangkat</td>
          <td style=" border:none;">:</td>
          <td style=" border:none;">{{ \Carbon\Carbon::parse($jadwal->tanggal_mulai)->locale('id')->translatedFormat('d F Y') }}</td>
        </tr>
        <tr style=" border:none;">
          <td style="text-align:center; border:none;">12.</td>
          <td style=" border:none;">Tanggal harus kembali</td>
          <td style=" border:none;">:</td>
          <td style=" border:none;">{{ \Carbon\Carbon::parse($jadwal->tanggal_selesai)->locale('id')->translatedFormat('d F Y') }}</td>
        </tr>

        <tr style=" border:none;">
          <td style="width: 5%; border:none;">13.</td>
          <td style="width: 29%; border:none;">Pembebanan Anggaran</td><td style=" border:none;">:</td>
          <td style="width: 65%; border:none;;" >DPA Program Upaya Kesehatan Masyarakat atas: Kegiatan Bantuan Operasional Kesehatan (BOK) T.A 2025</td>
        </tr>
        <tr style=" border:none;">
          <td style="width: 5%; border:none;">14.</td>
          <td style="width: 29%; border:none;">a. Mata Anggaran</td><td style=" border:none;">:</td>
          <td style="width: 65%; border:none;">&nbsp;</td>
        </tr>
        <tr style=" border:none;">
          <td style="width: 5%; border:none;">&nbsp;</td>
          <td style="width: 29%; border:none;">b. Kode Rekening</td><td style=" border:none;">:</td>
          <td style="width: 65%; border:none;" >1.02.02.2.02.33</td>
        </tr>
        <tr style=" border:none;">
          <td style="text-align:center; border:none;">15.</td>
          <td style=" border:none;">Pengikut</td>
          <td style=" border:none;">:</td>
          <td style=" border:none;">-</td>
        </tr>
      </tbody>
    </table>


     {{-- <div class="section-title">Daftar Pengikut:</div>  --}}
    <table>
      <thead>
        <tr>
          <th style="width: 5%;">No</th>
          <th style="width: 45%;">Nama</th>
          <th style="width: 25%;">Jabatan</th>
          <th style="width: 25%;">Keterangan</th>
        </tr>
      </thead>
      <tbody>


        @foreach ($jadwal->pengikut as $i => $pengikut)
                        <tr>
                            <td>{{ $i + 1 }}.</td>
                            <td>{{ $pengikut->pegawai->nama }}</td>
                            <td>{{ $pengikut->pegawai->jabatan }}</td>
                            <td>-</td>
                        </tr>

        @endforeach
      </tbody>
    </table>



    <div class="section-title">URAIAN:</div>
    <ol style="margin-top: 0; margin-left: 20px; font-size: 14px;">
      <li>Supaya melapor di tempat tujuan.</li>
      <li>Membuat laporan tertulis tentang hasil pelaksanaan tugas.</li>
    </ol>

    <table style="border: none;">
      <tbody style="border: none;">
        <tr style="border: none;">
          <td style="width: 20%; border: none;"></td>
          <td style="width: 40%; border: none;"></td>
          <td style="width: 40%; border: none;;" >Dikeluarkan di : Pulau Mansinam <br>Pada Tanggal : {{ \Carbon\Carbon::parse($jadwal->tanggal_mulai)->locale('id')->translatedFormat('d F Y') }}</td>
        </tr>
        <tr style="border: none;">
          <td style="width: 20%; border: none;"></td>
          <td style="width: 40%; border: none;"></td>
          <td style="width: 40%; border: none;;" >Kepala Puskesmas Pulau Mansinam <br><br><br><br><br><b>OKTOVIANUS SORBU, AMK</b><br>NIP. 19801030 200012 1 005</td>
        </tr>
      </tbody>
    </table> <br> <br> <br>



{{-- <h2>Surat Perintah Tugas</h2>
<p><strong>Nomor SPT:</strong> {{ $jadwal->nomor_spt }}</p>
<p><strong>Nama Petugas:</strong> {{ $jadwal->pegawai->nama }}</p>
<p><strong>Tujuan:</strong> {{ $jadwal->tujuan }}</p>
<p><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($jadwal->tanggal_mulai)->format('d/m/Y') }} s/d {{ \Carbon\Carbon::parse($jadwal->tanggal_selesai)->format('d/m/Y') }}</p>

<p><strong>Kegiatan:</strong> {{ $jadwal->kegiatan->nama_kegiatan }}</p>
<p><strong>Keterangan:</strong> {{ $jadwal->kegiatan->keterangan }}</p>

@if ($jadwal->pengikut->count())
    <h4>Pengikut:</h4>
    <ul>
        @foreach ($jadwal->pengikut as $pengikut)
            <li>{{ $pengikut->pegawai->nama }}</li>
        @endforeach
    </ul>
@endif --}}

</body>
</html>
