<?php

namespace App\Filament\Resources\KegiatanResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class JadwalsRelationManager extends RelationManager
{
    protected static string $relationship = 'jadwals';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nomor_spt')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('tanggal_mulai')
                    ->required(),
                Forms\Components\DatePicker::make('tanggal_selesai')
                    ->required(),
                Forms\Components\TextInput::make('tujuan')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('pegawai_id')
                    ->relationship('pegawai', 'nama')
                    ->label('Penanggung Jawab')
                    ->required(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('nomor_spt')
            ->columns([
                Tables\Columns\TextColumn::make('nomor_spt'),
                Tables\Columns\TextColumn::make('tanggal_mulai')
                    ->date(),
                Tables\Columns\TextColumn::make('tanggal_selesai')
                    ->date(),
                Tables\Columns\TextColumn::make('tujuan'),
                Tables\Columns\TextColumn::make('pegawai.nama')
                    ->label('Penanggung Jawab'),
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
