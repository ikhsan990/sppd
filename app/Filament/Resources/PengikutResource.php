<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PengikutResource\Pages;
use App\Filament\Resources\PengikutResource\RelationManagers;
use App\Models\Pengikut;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PengikutResource extends Resource
{
    protected static ?string $model = Pengikut::class;
    protected static ?string $navigationIcon = 'heroicon-o-user-plus';
    protected static ?int $navigationSort = 4;
    protected static ?string $navigationLabel = 'Pengikut';
    protected static ?string $modelLabel = 'Pengikut';
    protected static ?string $pluralModelLabel = 'Daftar Pengikut';
    protected static bool $shouldRegisterNavigation = false;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('jadwal_id')
                    ->relationship('jadwal', 'nomor_spt')
                    ->required(),
                Forms\Components\Select::make('pegawai_id')
                    ->relationship('pegawai', 'nama')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('jadwal.nomor_spt')
                    ->sortable(),
                Tables\Columns\TextColumn::make('pegawai.nama')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPengikuts::route('/'),
            'create' => Pages\CreatePengikut::route('/create'),
            'edit' => Pages\EditPengikut::route('/{record}/edit'),
        ];
    }
}
