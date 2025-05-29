<?php

namespace App\Filament\Resources\SptjbResource\Pages;

use Filament\Actions;
use Illuminate\Support\Facades\URL;
use App\Filament\Resources\SptjbResource;
use Filament\Resources\Pages\ListRecords;
use Filament\Pages\Actions\Action;

class ListSptjbs extends ListRecords
{
    protected static string $resource = SptjbResource::class;

        protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make('export_excel')
                ->label('Export Excel')
                ->icon('heroicon-m-magnifying-glass')
                ->url(fn () => URL::signedRoute('filament.resources.sptjb.export-excel'))
                ->openUrlInNewTab(),

            Actions\CreateAction::make('export_pdf')
                ->label('Export PDF')
                ->icon('heroicon-m-magnifying-glass')
                ->url(fn () => URL::signedRoute('filament.resources.sptjb.export-pdf'))
                ->openUrlInNewTab(),
        ];
    }
}
