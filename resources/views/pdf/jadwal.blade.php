<!DOCTYPE html>
<html lang="ID">
<head>
    <meta charset="utf-8">
    <title>Cetak SPPD</title>
    <style>
        body {
            font-family: "Times New Roman", Times, serif;
            font-size: 12px;
            line-height: 1.4;
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

    <header class="header-container" role="banner" aria-label="Header Puskesmas Pulau Mansinam">
            <table width="100%" cellspacing="0" cellpadding="5" style="border-bottom: 2px solid black;">
            <tr>
                <td width="15%" valign="middle">
                <img src="logo_pemda.png" alt="Logo Kabupaten Manokwari" style="max-height: 80px;">
                </td>
                <td width="70%" valign="middle" align-items="center" style="line-height: 1.2;">
                    <div style="font-weight: bold; font-size: 16px;">PEMERINTAH KABUPATEN MANOKWARI</div>
                    <div style="font-weight: bold; font-size: 18px;">DINAS KESEHATAN</div>
                    <div style="font-weight: bold; font-size: 20px;">UPTD PUSKESMAS PULAU MANSINAM</div>
                    <div style="font-size: 12px; font-style: italic;">Alamat: Jl. Lingkar Selatan Pulau Mansinam, Manokwari - Papua Barat</div>
                </td>
                <td width="15%" valign="middle">
                    <img src="logo_pkm.png" alt="Logo Puskesmas" style="max-height: 80px;">
                </td>
            </tr>
        </table>
    </header>

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
            <td>: {{ $jadwal->pegawai->nama }}</td>
        </tr>
        <tr>
            <td>3.</td>
            <td>NIP / NRPK</td>
            <td>: {{ $jadwal->pegawai->nip }}</td>
        </tr>
        <tr>
            <td>4.</td>
            <td>Pangkat / Golongan</td>
            <td>: {{ $jadwal->pegawai->pangkat }} / {{ $jadwal->pegawai->golongan }}</td>
        </tr>
        <tr>
            <td>5.</td>
            <td>Jabatan</td>
            <td>: {{ $jadwal->pegawai->jabatan }}</td>
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
            <td>: {{ \Carbon\Carbon::parse($jadwal->tanggal_mulai)->locale('id')->translatedFormat('d F Y') }}</td>
        </tr>
        <tr>
            <td>12.</td>
            <td>Tanggal Harus Kembali</td>
            <td>: {{ \Carbon\Carbon::parse($jadwal->tanggal_selesai)->locale('id')->translatedFormat('d F Y') }}</td>
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
                <th width="20px">No</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
                    @php  $nonAsn = $jadwal->pengikut->filter(fn($p) => $p->pegawai->status !== 'asn')->values(); @endphp

                    @forelse ($nonAsn as $i => $pengikut)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $pengikut->pegawai->nama }}</td>
                            <td>{{ $pengikut->pegawai->jabatan }}</td>
                            <td><i>{{ $pengikut->pegawai->status }}</i></td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4"><em>Tidak ada pengikut.</em></td>
                        </tr>
                    @endforelse
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
