<?php

namespace App\Filament\Resources\LaporanResource\Pages;

use App\Filament\Resources\LaporanResource;
use Filament\Resources\Pages\ViewRecord;

class ViewLaporan extends ViewRecord
{
    protected static string $resource = LaporanResource::class;

    //     protected function getViewData(): array
    // {
    //     $data = parent::getViewData();

    //     // Ambil data foto yang mungkin berupa JSON array string
    //     $foto = $this->record->foto;

    //     // Jika foto adalah JSON array, decode dan buat URL yang benar
    //     $fotoUrls = [];

    //     if ($foto) {
    //         $files = json_decode($foto, true);
    //         if (is_array($files)) {
    //             foreach ($files as $file) {
    //                 $fotoUrls[] = asset('storage/foto/' . $file);
    //             }
    //         } else {
    //             // Bila bukan array, misal string path langsung
    //             $fotoUrls[] = asset('storage/foto/' . $foto);
    //         }
    //     }

    //     $data['fotoUrls'] = $fotoUrls;

    //     return $data;
    // }
}
