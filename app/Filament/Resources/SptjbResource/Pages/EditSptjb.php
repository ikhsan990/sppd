<?php

namespace App\Filament\Resources\SptjbResource\Pages;

use App\Filament\Resources\SptjbResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSptjb extends EditRecord
{
    protected static string $resource = SptjbResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
