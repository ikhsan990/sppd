## Deskripsi

Aplikasi SPPD Puskesmas adalah sebuah sistem yang dirancang untuk memudahkan pengelolaan Surat Perintah Perjalanan Dinas (SPPD) di lingkungan Puskesmas Khusus dalam pengelolaan BOK. Aplikasi ini membantu dalam pembuatan, pengelolaan, dan pelaporan SPPD secara digital sehingga proses administrasi menjadi lebih efisien dan terorganisir.

Aplikasi SPPD ini dikhususkan untuk membantu Bendahara BOK / Admin Puskesmas untuk memproses dokumen-dokumen pertanggung jawaban BOK. Fitur-fitur lainnya akan secara bertahap di kembangkan

## Fitur Utama

<li>Pembuatan Surat Perintah Perjalanan Dinas secara cepat dan mudah</li>
<li>SPPD, SPT dan KWITANSI bisa langsung di cetak dengan cepat dan mudah</li>
<li>Manajemen Jadwal Kegiatan</li>

## Fitur yang akan dikembangkan
<li>Rekap SPTJB BOK</li>
<li>Export excel - template Transfer Massal BNI Direct</li>
<li>Rekap Hitung jumlah kegiatan per Pegawai/Jumlah uang yang diterima pegawai</li>
<li>Input Jadwal Kegiatan oleh masing-masing PJ</li>

## Instalasi
- run `` git clone https://github.com/ikhsan990/sppd.git ``
- run ``composer install `` 
- run `` npm install ``
- run ``npm run dev``
- copy .env.example to .env
- run `` php artisan key:generate ``
- set up your database in the .env
- run `` php artisan storage:link ``
- run `` php artisan serve ``
- then visit `` http://localhost:8000 or http://127.0.0.1:8000 ``.

# Admin Credentials
> Email: admin@admin.com || Password: password

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
