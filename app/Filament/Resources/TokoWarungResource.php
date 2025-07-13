<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TokoWarungResource\Pages;
use App\Models\TokoWarung;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Form;
class TokoWarungResource extends Resource
{
    protected static ?string $model = TokoWarung::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';
    protected static ?string $navigationGroup = 'MASTER';
    protected static ?string $navigationLabel = 'Toko/Warung';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('alamat')
                    ->required(),
                Forms\Components\TextInput::make('nomor_rekening')
                    ->required()
                    ->maxLength(50),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->sortable(),
                Tables\Columns\TextColumn::make('nama')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('nomor_rekening'),
                Tables\Columns\TextColumn::make('created_at')->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTokoWarungs::route('/'),
            'create' => Pages\CreateTokoWarung::route('/create'),
            'edit' => Pages\EditTokoWarung::route('/{record}/edit'),
        ];
    }
}
