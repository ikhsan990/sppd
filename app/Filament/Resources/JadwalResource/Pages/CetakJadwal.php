<?php

namespace App\Filament\Resources\JadwalResource\Pages;

use App\Filament\Resources\JadwalResource;
use Filament\Actions;
use Filament\Resources\Pages\Page;

class CetakJadwal extends Page
{
    protected static string $resource = JadwalResource::class;
    protected static string $view = 'filament.resources.jadwal-resource.pages.cetak-sppd';

    public $record;

    public function mount($record)
    {
        $this->record = \App\Models\Jadwal::findOrFail($record);
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('cetak')
                ->label('Cetak')
                ->icon('heroicon-o-printer')
                ->color('success')
                ->action('window.print()'),
        ];
    }
}
