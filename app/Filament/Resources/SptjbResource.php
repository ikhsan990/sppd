<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SptjbResource\Pages;
use App\Models\Jadwal;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;

class SptjbResource extends Resource
{
    protected static ?string $model = Jadwal::class;

    protected static ?string $navigationLabel = 'SPTJB';
    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationGroup = 'Rekapitulasi';
    protected static ?int $navigationSort = 2;

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nomor_spt')->label('Nomor SPT')->sortable()->searchable(),
                TextColumn::make('tanggal_mulai')->label('Tanggal Mulai')->date()->sortable(),
                TextColumn::make('tanggal_selesai')->label('Tanggal Selesai')->date()->sortable(),
                TextColumn::make('kegiatan.nama_kegiatan')->label('Kegiatan')->sortable()->searchable(),
                TextColumn::make('pegawai.nama')->label('Pegawai')->sortable()->searchable(),
                TextColumn::make('tujuan')->label('Tujuan')->searchable(),
            ])
            ->filters([
                SelectFilter::make('kegiatan_id')
                    ->label('Filter Kegiatan')
                    ->relationship('kegiatan', 'nama_kegiatan'),

                SelectFilter::make('pegawai_id')
                    ->label('Filter Pegawai')
                    ->relationship('pegawai', 'nama'),
            ])
            ->defaultSort('tanggal_mulai', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSptjbs::route('/'),
        ];
    }
}
