<?php

namespace App\Filament\Resources\JadwalResource\Pages;

use Filament\Actions;

use Filament\Actions\Action;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\JadwalResource;

class EditJadwal extends EditRecord
{
    protected static string $resource = JadwalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
            ->label('Hapus Jadwal'),

            Action::make('createJadwal')
                ->label('Create Jadwal')
                ->icon('heroicon-o-plus')
                ->color('primary')
                ->url(route('filament.admin.resources.jadwals.create')),
        ];


    }




}
