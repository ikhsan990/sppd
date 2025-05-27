<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PegawaiResource\Pages;
use App\Filament\Resources\PegawaiResource\RelationManagers;
use App\Models\Pegawai;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PegawaiResource extends Resource
{
    protected static ?string $model = Pegawai::class;
    protected static ?string $modelLabel = 'Pegawai';
    protected static ?string $pluralModelLabel = 'Daftar Pegawai';
    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationGroup = 'MASTER';
    protected static ?string $navigationLabel = 'Pegawai';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nip')
                    ->required()
                    //->unique(ignoreRecord: false)
                    ->maxLength(255),
                Forms\Components\TextInput::make('pangkat')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('golongan')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('jabatan')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('status')
                    ->options([
                        'asn' => 'ASN',
                        'non-asn' => 'Non-ASN',
                    ])
                    ->required(),
                Forms\Components\TextInput::make('no_rek')
                    ->maxLength(255),
                Forms\Components\TextInput::make('nama_rek')
                    ->maxLength(255),
                Forms\Components\TextInput::make('transport_lokal')
                    ->default(150000)
                    ->numeric()
                    ->maxLength(255),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nip')
                    ->searchable(),
                Tables\Columns\TextColumn::make('pangkat'),
                Tables\Columns\TextColumn::make('golongan'),
                Tables\Columns\TextColumn::make('jabatan'),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'asn' => 'success',
                        'non-asn' => 'danger',

                    }),

            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'asn' => 'ASN',
                        'non-asn' => 'Non-ASN',

                    ]),
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

    public static function getRelations(): array
    {
        return [
            RelationManagers\JadwalsRelationManager::class,
            RelationManagers\PengikutsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPegawais::route('/'),
            'create' => Pages\CreatePegawai::route('/create'),
            'edit' => Pages\EditPegawai::route('/{record}/edit'),
        ];
    }
}
