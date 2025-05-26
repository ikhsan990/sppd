<?php

namespace App\Filament\Resources\PengikutResource\Pages;

use App\Filament\Resources\PengikutResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPengikut extends EditRecord
{
    protected static string $resource = PengikutResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
