<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title>SPPD {{ $jadwal->kegiatan->alias }}</title>
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
</div>


    <h2 style="text-align: center; font-weight: bold; margin-bottom: 5px; margin-top: 30px;">SURAT PERINTAH PERJALANAN DINAS</h2>
    <div style="text-align: center; font-weight: normal; margin-bottom: 10px; font-size: 14px;">NOMOR : 094/ {{ $jadwal->nomor_spt }} /SPPD/BOK/___/2025</div>
    <br>
    <table>
      <tbody>
        <tr>
          <td style="text-align:center;">1</td>
          <td>Pejabat yang memberi perintah</td>
          <td>:</td>
          <td>Kepala Puskesmas Pulau Mansinam</td>
        </tr>
        <tr>
          <td style="text-align:center;">2</td>
          <td>Pegawai yang diperintahkan</td>
          <td>:</td>
          <td><strong>{{ $jadwal->pegawai->nama }}</strong></td>
        </tr>
        <tr>
          <td style="text-align:center;">3</td>
          <td>NIP/NIPPK</td>
          <td>:</td>
          <td>{{ $jadwal->pegawai->nip }}</td>
        </tr>
        <tr>
          <td style="text-align:center;">4</td>
          <td>Pangkat / Golongan</td>
          <td>:</td>
          <td>{{ $jadwal->pegawai->pangkat }} / {{ $jadwal->pegawai->golongan }}</td>
        </tr>
        <tr>
          <td style="text-align:center;">5</td>
          <td>Jabatan</td>
          <td>:</td>
          <td>{{ $jadwal->pegawai->jabatan }}</td>
        </tr>
        <tr>
          <td style="text-align:center;">6</td>
          <td>Maksud Perjalanan Dinas</td>
          <td>:</td>
          <td>{{ $jadwal->kegiatan->nama_kegiatan }}</td>
        </tr>
        <tr>
          <td style="text-align:center;">7</td>
          <td>Angkutan yang dipergunakan</td>
          <td>:</td>
          <td>Angkutan Darat</td>
        </tr>
        <tr>
          <td style="text-align:center;">8</td>
          <td>Tempat berangkat</td>
          <td>:</td>
          <td>Puskesmas Pulau Mansinam</td>
        </tr>
        <tr>
          <td style="text-align:center;">9</td>
          <td>Tempat tujuan</td>
          <td>:</td>
          <td>{{ $jadwal->tujuan }}</td>
        </tr>
        <tr>
          <td style="text-align:center;">10</td>
          <td>Lama Perjalanan Dinas</td>
          <td>:</td>
          <td>   @php
                    // Pastikan tanggal_mulai dan tanggal_selesai adalah objek Carbon
                    $tanggalMulai = \Carbon\Carbon::parse($jadwal->tanggal_mulai);
                    $tanggalSelesai = \Carbon\Carbon::parse($jadwal->tanggal_selesai);

                    // Hitung jumlah hari secara inklusif (termasuk tanggal mulai dan tanggal selesai)
                    $jumlahHari = $tanggalMulai->diffInDays($tanggalSelesai) + 1 ;
                    @endphp
                {{ $jumlahHari }} Hari
          </td>
        </tr>
        <tr>
          <td style="text-align:center;">11</td>
          <td>Tanggal berangkat</td>
          <td>:</td>
          <td>{{ \Carbon\Carbon::parse($jadwal->tanggal_mulai)->locale('id')->translatedFormat('d F Y') }}</td>
        </tr>
        <tr>
          <td style="text-align:center;">12</td>
          <td>Tanggal harus kembali</td>
          <td>:</td>
          <td>{{ \Carbon\Carbon::parse($jadwal->tanggal_selesai)->locale('id')->translatedFormat('d F Y') }}</td>
        </tr>
        <tr>
          <td style="text-align:center;">13</td>
          <td>Pengikut</td>
          <td>:</td>
          <td>-</td>
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
            @php  $nonAsn = $jadwal->pengikut->filter(fn($p) => $p->pegawai->status !== 'asn')->values(); @endphp

            @forelse ($nonAsn as $i => $pengikut)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $pengikut->pegawai->nama }}</td>
                            <td>{{ $pengikut->pegawai->Jabatan }}</td>
                            <td>-</i></td>
                        </tr>
            @empty
                        <tr>
                            <td colspan="4"><em>Tidak ada pengikut.</em></td>
                        </tr>
            @endforelse
      </tbody>
    </table>

    <table>
      <tbody>
        <tr>
          <td style="width: 5%;">14</td>
          <td style="width: 29%;">Pembebanan Anggaran</td><td>:</td>
          <td style="width: 65%; border-top:none;" >DPA Program Upaya Kesehatan Masyarakat atas: Kegiatan Bantuan Operasional Kesehatan (BOK) T.A 2025</td>
        </tr>
        <tr>
          <td style="width: 5%; border-top:none;">15</td>
          <td style="width: 29%; border-top:none;">a. Mata Anggaran</td><td>:</td>
          <td style="width: 65%; border-top:none;">&nbsp;</td>
        </tr>
        <tr>
          <td style="width: 5%; border-top:none; border-bottom:none;">&nbsp;</td>
          <td style="width: 29%; border-top:none; border-bottom:none;">b. Kode Rekening</td><td>:</td>
          <td style="width: 65%; border-top:none; border-bottom:none;" >1.02.02.2.02.33</td>
        </tr>
      </tbody>
    </table>

    <div class="section-title">URAIAN:</div>
    <ol style="margin-top: 0; margin-left: 20px; font-size: 14px;">
      <li>Supaya melapor di tempat tujuan.</li>
      <li>Membuat laporan tertulis tentang hasil pelaksanaan tugas.</li>
    </ol>
    <br>
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

  <!-- HALAMAN 2 -->
    <div class="page" id="page2">

<table style="border-collapse: collapse; width: 100%; border: 1px solid black;">
    <tbody>
        <tr>
            <td rowspan="2" style="border: 1px solid black; border-right: none; vertical-align: top; padding: 4px 8px;">I.</td>
            <td rowspan="2" colspan="2" style="border: 1px solid black; border-right: none; vertical-align: top; padding: 4px 8px;">
            </td>
            <td style="border: 1px solid black; border-right: none; vertical-align: top; padding: 4px 8px;">
                Berangkat dari <br> Ke <br> Pada tanggal <br> NO. SPPD
            </td>
            <td style="border: 1px solid black; border-left: none; vertical-align: top; padding: 4px 8px;">
                : Puskesmas Pulau Mansinam <br> : Salobar <br> : {{ \Carbon\Carbon::parse($jadwal->tanggal_mulai)->locale('id')->translatedFormat('d F Y') }} <br> : 094/{{ $jadwal->nomor_spt }}/SPPD/BOK/___/2025
            </td>
        </tr>
        <tr>
            <td colspan="2" style="border: 1px solid black; text-align: center; vertical-align: top; padding-top: 5px; padding-bottom: 8px;">
                Kepala Puskesmas Pulau Mansinam <br><br><br><br><br><br>
                <strong>OKTOVIANUS SORBU, AMK</strong> <br>
                NIP. 19801030 200012 1 005
            </td>
        </tr>
        <tr>
            <td>II.</td>
            <td style="border: 1px solid black; border-right: none; vertical-align: top; padding: 4px 8px;">
                Tiba di <br> Pada tanggal<br>  <br>
            </td>
            <td style="border: 1px solid black; border-left: none; vertical-align: top; padding: 4px 8px;">
                : {{ $jadwal->tujuan }} <br> : {{ \Carbon\Carbon::parse($jadwal->tanggal_mulai)->locale('id')->translatedFormat('d F Y') }} <br>  <br>
            </td>
            <td style="border: 1px solid black; border-right: none; vertical-align: top; padding: 4px 8px;">
                Berangkat dari <br> Pada tanggal <br>Ke  <br>
            </td>
            <td style="border: 1px solid black; border-left: none; vertical-align: top; padding: 4px 8px;">
                : {{ $jadwal->tujuan }} <br> : {{ \Carbon\Carbon::parse($jadwal->tanggal_selesai)->locale('id')->translatedFormat('d F Y') }} <br> : Puskesmas Pulau Mansinam <br>
            </td>
        </tr>
        <tr>
            <td></td>
            <td colspan="2" style="border: 1px solid black; text-align: center; vertical-align: top; padding-top: 5px; padding-bottom: 8px;">
                Kepala Kampung/Kelurahan/Posyandu <br><br><br><br><br><br>
                ______________________________<br>
                NIP. ___________________________</td>

            <td colspan="2" style="border: 1px solid black; text-align: center; vertical-align: top; padding-top: 5px; padding-bottom: 8px;">
                Kepala Kampung/Kelurahan/Posyandu <br><br><br><br><br><br>
                ______________________________<br>
                NIP. ___________________________</td>
        </tr>
        <tr>
            <td>III.</td>
            <td style="border: 1px solid black; border-right: none; vertical-align: top; padding: 4px 8px;">
                Tiba di <br> Pada tanggal<br>  <br>
            </td>
            <td style="border: 1px solid black; border-left: none; vertical-align: top; padding: 4px 8px;">
                :  <br> :  <br>  <br>
            </td>
            <td style="border: 1px solid black; border-right: none; vertical-align: top; padding: 4px 8px;">
                Berangkat dari <br> Pada tanggal <br>Ke  <br>
            </td>
            <td style="border: 1px solid black; border-left: none; vertical-align: top; padding: 4px 8px;">
                :  <br> :  <br> : Puskesmas Pulau Mansinam <br>
            </td>
        </tr>
        <tr>
            <td></td>
            <td colspan="2" style="border: 1px solid black; text-align: center; vertical-align: top; padding-top: 5px; padding-bottom: 8px;">
                Kepala Kampung/Kelurahan/Posyandu <br><br><br><br><br><br>
                ______________________________<br>
                NIP. ___________________________</td>

            <td colspan="2" style="border: 1px solid black; text-align: center; vertical-align: top; padding-top: 5px; padding-bottom: 8px;">
                Kepala Kampung/Kelurahan/Posyandu <br><br><br><br><br><br>
                ______________________________<br>
                NIP. ___________________________</td>
        </tr>
        <tr>
            <td>IV.</td>
            <td style="border: 1px solid black; border-right: none; vertical-align: top; padding: 4px 8px;">
                Tiba di <br> Pada tanggal<br>  <br>
            </td>
            <td style="border: 1px solid black; border-left: none; vertical-align: top; padding: 4px 8px;">
                :  <br> :  <br>  <br>
            </td>
            <td style="border: 1px solid black; border-right: none; vertical-align: top; padding: 4px 8px;">
                Berangkat dari <br> Pada tanggal <br>Ke  <br>
            </td>
            <td style="border: 1px solid black; border-left: none; vertical-align: top; padding: 4px 8px;">
                :  <br> :  <br> : Puskesmas Pulau Mansinam <br>
            </td>
        </tr>
        <tr>
            <td></td>
            <td colspan="2" style="border: 1px solid black; text-align: center; vertical-align: top; padding-top: 5px; padding-bottom: 8px;">
                Kepala Kampung/Kelurahan/Posyandu <br><br><br><br><br><br>
                ______________________________<br>
                NIP. ___________________________</td>

            <td colspan="2" style="border: 1px solid black; text-align: center; vertical-align: top; padding-top: 5px; padding-bottom: 8px;">
                Kepala Kampung/Kelurahan/Posyandu <br><br><br><br><br><br>
                ______________________________<br>
                NIP. ___________________________</td>
        </tr>
        <tr>
            <td>V.</td>
            <td style="border: 1px solid black; border-right: none; vertical-align: top; padding: 4px 8px;">
                Telah tiba Kembali <br> di <br> Pada tanggal <br>
            </td>
            <td style="border: 1px solid black; border-left: none; vertical-align: top; padding: 4px 8px;">
                 <br> : Puskesmas Pulau Mansinam <br> : 12 Mei 2025
            </td>
            <td colspan="2" style="border: 1px solid black; border-right: none; vertical-align: top; padding: 4px 8px;">
                Telah  diperiksa  bahwa  Perjalanan  Dinas tersebut <br>di atas benar - benat dilakukan  atas  perintah dengan <br>semata - mata untuk  kepentingan  Jabatan dalam <br>waktu  yang  sesingkat - singkatnya.
            </td>

        </tr>
        <tr>
            <td></td>
            <td colspan="2" style="border: 1px solid black; text-align: center; vertical-align: top; padding-top: 5px; padding-bottom: 8px;">
                Pegawai yang diperintahkan<br><br><br><br><br><br>
                <strong>{{ $jadwal->pegawai->nama }}</strong> <br>
                NIP. {{ $jadwal->pegawai->nip }}</td>

            <td colspan="2" style="border: 1px solid black; text-align: center; vertical-align: top; padding-top: 5px; padding-bottom: 8px;">
                Pejabat yang memberi perintah <br>Kepala Puskesmas Pulau Mansinam<br><br><br><br><br>
                <strong>OKTOVIANUS SORBU, AMK</strong> <br>
                NIP. 19801030 200012 1 005
            </td>
        </tr>
        <tr>
            <td>VI.</td>
            <td  colspan="4" style="border: 1px solid black; border-right: none; vertical-align: top; padding: 4px 8px;">
                PERHATIAN: <br>PPK yang menerbitkan SPD, pegawai yang melakukan perjalanan dinas, para pejabat yang mengesahkan tanggal berangkat/tiba, serta bendahara pengeluaran bertanggung jawab berdasarkan peraturan-peraturan Keuangan Negara apabila negara menderita rugi akibat kesalahan, kelalaian, dan kealpaannya.
            </td>
        </tr>

    </tbody>
</table>


</body>
</html>
