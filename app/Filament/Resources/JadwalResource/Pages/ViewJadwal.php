<?php

namespace App\Filament\Resources\JadwalResource\Pages;

use App\Filament\Resources\JadwalResource;
use Filament\Resources\Pages\ViewRecord;
use Filament\Actions\Action;

class ViewJadwal extends ViewRecord
{
    protected static string $resource = JadwalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Action::make('Cetak')
            //     ->label('Cetak Kwitansi')
            //     ->icon('heroicon-o-printer')
            //      ->url(fn (): string => route('cetak.kwitansi', $this->getRecord()))
            //     ->openUrlInNewTab(),
        ];
    }
}
