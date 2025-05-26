<!DOCTYPE html>
<html lang="ID">
<head>
    <meta charset="utf-8">
    <title>Cetak SPPD</title>
    <style>
        body {
            font-family: "Times New Roman", Times, serif;
            font-size: 12px;
            line-height: 1.6;
        }

        .header {
            text-align: center;
            border-bottom: 2px solid black;
            padding-bottom: 5px;
        }

        .header img {
            float: left;
            height: 60px;
            margin-right: 10px;
        }

        .clear {
            clear: both;
        }

        .title {
            text-align: center;
            font-weight: bold;
            margin-top: 10px;
            margin-bottom: 10px;
        }

        .content {
            width: 100%;
        }

        .content td {
            vertical-align: top;
            padding: 2px 5px;
        }

        .content-number {
            width: 5%;
        }

        .content-label {
            width: 35%;
        }
        .no-column {
            width: 20px;
        }
        .signature {
            width: 100%;
            margin-top: 30px;
            text-align: right;
        }

        .uraian {
            margin-top: 20px;
            border: 1px solid black;
            padding: 10px;
        }

        table.pengikut {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        table.pengikut th, table.pengikut td {
            border: 1px solid black;
            padding: 4px;
            text-align: left;

        }
    </style>
</head>
<body>

    <!-- Kop Surat -->
    <div class="header">
        <img src="{{ public_path('logo-kabupaten.png') }}" alt="Logo">
        <strong>PEMERINTAH KABUPATEN MANOKWARI</strong><br>
        DINAS KESEHATAN<br>
        <strong>UPTD PUSKESMAS PULAU MANSINAM</strong><br>
        Alamat: Jl. Lingkar Selatan Pulau Mansinam, Manokwari - Papua Barat
    </div>
    <div class="clear"></div>

    <!-- Judul -->
    <div class="title">
        SURAT PERINTAH PERJALANAN DINAS<br>
        Nomor : {{ $jadwal->nomor_spt }}
    </div>

    <!-- Isi Surat -->
    <table class="content">
        <tr>
            <td class="content-number">1.</td>
            <td class="content-label">Pejabat Yang Berwenang Memberikan Perintah</td>
            <td>: Kepala Puskesmas Pulau Mansinam</td>
        </tr>
        <tr>
            <td>2.</td>
            <td>Nama pegawai yang diperintah</td>
            <td>: {{ $pengikut->pegawai->nama }}</td>
        </tr>
        <tr>
            <td>3.</td>
            <td>NIP / NRPK</td>
            <td>: {{ $pengikut->pegawai->nip }}</td>
        </tr>
        <tr>
            <td>4.</td>
            <td>Pangkat / Golongan</td>
            <td>: {{ $pengikut->pegawai->pangkat }} / {{ $pengikut->pegawai->golongan }}</td>
        </tr>
        <tr>
            <td>5.</td>
            <td>Jabatan</td>
            <td>: {{ $pengikut->pegawai->jabatan }}</td>
        </tr>
        <tr>
            <td>6.</td>
            <td>Maksud</td>
            <td>: {{ $jadwal->kegiatan->nama_kegiatan }}</td>
        </tr>
        <tr>
            <td>7.</td>
            <td>Alat Angkut</td>
            <td>: Angkutan Darat</td>
        </tr>
        <tr>
            <td>8.</td>
            <td>Tempat Berangkat</td>
            <td>: Puskesmas Pulau Mansinam</td>
        </tr>
        <tr>
            <td>9.</td>
            <td>Tempat Tujuan</td>
            <td>: {{ $jadwal->tujuan }}</td>
        </tr>
        <tr>
            <td>10.</td>
            <td>Lama Perjalanan</td>
            <td>:   @php
                    // Pastikan tanggal_mulai dan tanggal_selesai adalah objek Carbon
                    $tanggalMulai = \Carbon\Carbon::parse($jadwal->tanggal_mulai);
                    $tanggalSelesai = \Carbon\Carbon::parse($jadwal->tanggal_selesai);

                    // Hitung jumlah hari secara inklusif (termasuk tanggal mulai dan tanggal selesai)
                    $jumlahHari = $tanggalMulai->diffInDays($tanggalSelesai) + 1 ;
                    @endphp
                {{ $jumlahHari }} hari
            </td>
        </tr>
        <tr>
            <td>11.</td>
            <td>Tanggal Harus Berangkat</td>
            <td>: {{ \Carbon\Carbon::parse($jadwal->tanggal_mulai)->format('d F Y') }}</td>
        </tr>
        <tr>
            <td>12.</td>
            <td>Tanggal Harus Kembali</td>
            <td>: {{ \Carbon\Carbon::parse($jadwal->tanggal_selesai)->format('d F Y') }}</td>
        </tr>
        <tr>
            <td>13.</td>
            <td>Beban Anggaran</td>
            <td>: DPA Program Upaya Kesehatan Masyarakat atas kegiatan BOK T.A 2025</td>
        </tr>
        <tr>
            <td>14.</td>
            <td>Kode Rekening</td>
            <td>: 1.02.02.2.02.33</td>
        </tr>
        <tr>
    <td>15.</td>
    <td>Pengikut</td>
    <td>:</td>
</tr>
<td></td>
<td colspan="2">
    <table class="pengikut">
        <thead>
            <tr>
                <th class="no-column">No</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
                        <tr>
                            <td colspan="4"><em>Tidak ada pengikut.</em></td>
                        </tr>

                </tbody>
            </table>
        </td>
    </table>

    <!-- Uraian Tugas -->
    <div class="uraian">
        <strong>Uraian:</strong><br>
        1. Supaya melapor di tempat tujuan.<br>
        2. Membuat laporan tertulis tentang hasil pelaksanaan tugas.
    </div>

    <!-- Tanda Tangan -->
    <div class="signature">
        Dikeluarkan di: Pulau Mansinam<br>
        Pada Tanggal: {{ \Carbon\Carbon::parse($jadwal->tanggal_mulai)->format('d F Y') }}<br><br><br>
        <strong>Kepala Puskesmas Pulau Mansinam</strong><br><br><br>
        <strong><u>Nama Pejabat</u></strong><br>
        NIP. 1234567890
    </div>

</body>
</html>
