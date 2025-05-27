<?php

namespace App\Filament\Resources\KegiatanResource\Pages;

use Filament\Actions;
use Filament\Actions\Action;
use Filament\Actions\ImportAction;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\KegiatanResource;

class ListKegiatans extends ListRecords
{
    protected static string $resource = KegiatanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //Action::make('import')
                //->label('Import Data')
                //->icon('heroicon-o-cloud-upload') // Icon upload, bisa diganti sesuai selera
                //->url($this->getResource()::getUrl('import')) // Mengarah ke halaman import
                //->openUrlInNewTab(), // Opsional: buka di tab baru
            Actions\CreateAction::make(),
        ];
    }
}
