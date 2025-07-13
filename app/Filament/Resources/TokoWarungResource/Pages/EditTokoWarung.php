<?php

namespace App\Filament\Resources\TokoWarungResource\Pages;

use App\Filament\Resources\TokoWarungResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTokoWarung extends EditRecord
{
    protected static string $resource = TokoWarungResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
