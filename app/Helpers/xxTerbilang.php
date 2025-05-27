<?php

namespace App\Helpers;

class Terbilang
{
    private static $angka = array(
        0 => '', 1 => 'satu', 2 => 'dua', 3 => 'tiga', 4 => 'empat', 5 => 'lima',
        6 => 'enam', 7 => 'tujuh', 8 => 'delapan', 9 => 'sembilan'
    );

    private static $satuan = array(
        0 => '', 1 => 'puluh', 2 => 'ratus', 3 => 'ribu', 4 => 'juta',
        5 => 'milyar', 6 => 'triliun'
    );

    private static function terbilang($value)
    {
        $string = '';
        $panjang = strlen($value);
        $bagian = $panjang / 3;
        $sisa = $panjang % 3;

        for ($i = 0; $i < $bagian; $i++) {
            $startIndex = $panjang - (($i + 1) * 3);
            if ($sisa > 0 && $i == $bagian - 1) { // jika ada sisa di bagian paling kiri
                $startIndex = 0;
                $currentPart = substr($value, $startIndex, $sisa);
            } else {
                $currentPart = substr($value, $startIndex, 3);
            }

            $currentPart = (int) $currentPart;

            if ($currentPart > 0) {
                $temp = '';
                $ratusan = floor($currentPart / 100);
                $puluhan = floor(($currentPart % 100) / 10);
                $satuan = $currentPart % 10;

                if ($ratusan == 1) {
                    $temp .= 'seratus ';
                } elseif ($ratusan > 1) {
                    $temp .= self::$angka[$ratusan] . ' ratus ';
                }

                if ($puluhan == 1) {
                    if ($satuan == 0) {
                        $temp .= 'sepuluh ';
                    } elseif ($satuan == 1) {
                        $temp .= 'sebelas ';
                    } else {
                        $temp .= self::$angka[$satuan] . ' belas ';
                    }
                } elseif ($puluhan > 1) {
                    $temp .= self::$angka[$puluhan] . ' puluh ';
                    if ($satuan > 0) {
                        $temp .= self::$angka[$satuan] . ' ';
                    }
                } else {
                    if ($satuan > 0) {
                        $temp .= self::$angka[$satuan] . ' ';
                    }
                }

                if ($i == 0 && $panjang > 3 && $currentPart == 1) {
                    // special case for 'seribu'
                    if ($panjang > 6) { // if it's more than thousands (millions, billions)
                        $string = 'seribu ' . $string;
                    } else {
                        $string = 'seribu ' . $string;
                    }
                } else {
                    $string = trim($temp) . ' ' . self::$satuan[$i] . ' ' . $string;
                }
            }
        }

        return trim($string);
    }

    public static function rupiah($nilai)
    {
        if (!is_numeric($nilai)) {
            return '';
        }
        $nilai = abs($nilai);
        return self::terbilang($nilai);
    }
}
