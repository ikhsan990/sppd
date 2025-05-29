<?php

namespace App\Filament\Resources\PegawaiResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class PengikutsRelationManager extends RelationManager
{
    protected static string $relationship = 'pengikuts';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('jadwal_id')
                    ->relationship('jadwal', 'nomor_spt')
                    ->required(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('id')
            ->columns([
                Tables\Columns\TextColumn::make('jadwal.nomor_spt'),
                Tables\Columns\TextColumn::make('jadwal.tanggal_mulai')
                    ->date(),
                Tables\Columns\TextColumn::make('jadwal.tanggal_selesai')
                    ->date(),
                Tables\Columns\TextColumn::make('jadwal.kegiatan.nama_kegiatan'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
