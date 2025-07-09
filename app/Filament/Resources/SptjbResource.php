<?php

namespace App\Filament\Resources;

use App\Models\Jadwal;
use Filament\Tables\Table;
use Filament\Facades\Filament;
use Barryvdh\DomPDF\Facade\Pdf;
use Filament\Resources\Resource;
use Filament\Tables\Actions\Action;
use Illuminate\Support\Facades\URL;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use App\Filament\Resources\SptjbResource\Pages;


class SptjbResource extends Resource
{
    protected static ?string $model = Jadwal::class;
    protected static ?string $navigationLabel = 'SPTJB';
    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';
    protected static ?string $navigationGroup = '';
    protected static ?int $navigationSort = 5;
    protected static bool $shouldSkipAuthorization = true;


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nomor_spt')->label('Nomor SPT')->sortable()->searchable(),
                TextColumn::make('tanggal_mulai')->label('Tanggal Mulai')->date()->sortable(),

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
            ->actions([
                //
                ])
            ->defaultSort('tanggal_mulai', 'desc');
    }



    public function exportPdf()
{
    $jadwals = \App\Models\Jadwal::with(['kegiatan', 'pegawai'])->get();

    $pdf = Pdf::loadView('exports.sptjb', compact('jadwals'));
    return $pdf->download('rekap_sptjb_' . now()->format('Ymd_His') . '.pdf');
}
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSptjbs::route('/'),
        ];
    }
            public static function shouldRegisterNavigation(): bool
    {
        return Filament::auth()->user()?->can('view_any_sptjb');
    }
}
