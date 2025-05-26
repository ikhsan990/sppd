<?php

namespace App\Filament\Resources\PengikutResource\Pages;

use App\Filament\Resources\PengikutResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPengikuts extends ListRecords
{
    protected static string $resource = PengikutResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
