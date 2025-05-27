<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KegiatanResource\Pages;
use App\Filament\Resources\KegiatanResource\RelationManagers;
use App\Models\Kegiatan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Select;




class KegiatanResource extends Resource
{
    protected static ?string $model = Kegiatan::class;
    protected static ?string $modelLabel = 'Kegiatan';
    protected static ?string $pluralModelLabel = 'Daftar Kegiatan';
    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';
    protected static ?string $navigationGroup = 'MASTER';
    protected static ?string $navigationLabel = 'Kegiatan';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_kegiatan')
                    ->required()
                    ->maxLength(255),

                Select::make('menu')
                    ->options([
                        'PMT' => 'PMT',
                        'SIKLUS HIDUP' => 'SIKLUS HIDUP',
                        'Konsumsi SIKLUS HIDUP' => 'Konsumsi SIKLUS HIDUP',
                        'DETEKSI DINI' => 'DETEKSI DINI',
                        'MANAJEMEN' => 'MANAJEMEN',
                        'INSENTIF UKM' => 'INSENTIF UKM',
                    ])
                    ->native(false)
                    ->required()
                    ->searchable(),
                Forms\Components\TextInput::make('alias')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('jml_petugas')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('jml_hari')
                    ->required()
                    ->numeric(),
                Forms\Components\Textarea::make('keterangan')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_kegiatan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('menu'),
                Tables\Columns\TextColumn::make('alias'),
                Tables\Columns\TextColumn::make('jml_petugas')
                    ->numeric(),
                Tables\Columns\TextColumn::make('jml_hari')
                    ->numeric(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                // Tambahkan tombol import di sini sebagai action custom
               //Tables\Actions\Action::make('import')
                // ->label('Import Data')
                    //->icon('arrow-up-tray') //heroicon-o-cloud-upload
                //    ->url(static::getUrl('import'))
                //    ->openUrlInNewTab(false),
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
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKegiatans::route('/'),
            'create' => Pages\CreateKegiatan::route('/create'),
            'edit' => Pages\EditKegiatan::route('/{record}/edit'),
            //'import' => KegiatanImport::route('/import'),
            //'import' => Pages\KegiatanImport::route('/import'),

        ];
    }
}
