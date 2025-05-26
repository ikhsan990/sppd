<?php
namespace App\Filament\Resources\PegawaiResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class JadwalsRelationManager extends RelationManager
{
    protected static string $relationship = 'jadwals';

    protected static ?string $title = 'Daftar Jadwal sebagai Penanggung Jawab';

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
                Forms\Components\Select::make('kegiatan_id')
                    ->relationship('kegiatan', 'nama_kegiatan')
                    ->required(),
                Forms\Components\TextInput::make('tujuan')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('nomor_spt')
            ->columns([
                Tables\Columns\TextColumn::make('nomor_spt')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tanggal_mulai')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tanggal_selesai')
                    ->date(),
                Tables\Columns\TextColumn::make('kegiatan.nama_kegiatan'),
                Tables\Columns\TextColumn::make('tujuan'),
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
