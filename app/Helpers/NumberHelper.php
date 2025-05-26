<?php
function terbilang($angka)
{
    $angka = abs($angka);
    $bilangan = ["", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas"];
    $hasil = "";

    if ($angka < 12) {
        $hasil = " " . $bilangan[$angka];
    } elseif ($angka < 20) {
        $hasil = terbilang($angka - 10) . " Belas ";
    } elseif ($angka < 100) {
        $hasil = terbilang($angka / 10) . " Puluh " . terbilang($angka % 10);
    } elseif ($angka < 200) {
        $hasil = " Seratus" . terbilang($angka - 100);
    } elseif ($angka < 1000) {
        $hasil = terbilang($angka / 100) . " Ratus " . terbilang($angka % 100);
    } elseif ($angka < 2000) {
        $hasil = " Seribu" . terbilang($angka - 1000);
    } elseif ($angka < 1000000) {
        $hasil = terbilang($angka / 1000) . " Ribu " . terbilang($angka % 1000);
    } elseif ($angka < 1000000000) {
        $hasil = terbilang($angka / 1000000) . " Juta " . terbilang($angka % 1000000);
    }

    return trim($hasil);
}
