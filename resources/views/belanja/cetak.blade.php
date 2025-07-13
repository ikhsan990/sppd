<!DOCTYPE html>
<html lang="ID">
<head>
    <title>Cetak Belanja</title>
    <style>
        /* Styling cetak PDF */
    </style>
</head>
<body>
    <h1>Data Belanja</h1>



    <p>Nama: {{ $belanja->toko }}</p>
    <p>Jumlah: {{ $belanja->harga }}</p>
    <p>Jumlah: {{ $belanja->jumlah }} </p>
    <p>Jumlah: {{ $belanja->satuan }}</p>
    <p>Total: {{ $total_belanja }}</p>
    <p>Tanggal: {{ $belanja->tanggal_belanja }}</p>
    <!-- Tambahkan detail lain yang Anda ingin cetak -->
</body>
</html>
