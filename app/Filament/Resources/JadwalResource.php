<?php

namespace App\Filament\Resources;

use Closure;
use Filament\Forms;
use Filament\Tables;
use App\Models\Jadwal;
use App\Models\Pegawai;
use Filament\Forms\Get;
use App\Models\Kegiatan;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Barryvdh\DomPDF\Facade\Pdf;
use Filament\Resources\Resource;
use App\Rules\PegawaiJadwalOverlap;
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\Select;
use Filament\Tables\Actions\ActionGroup;
use App\Filament\Resources\JadwalResource\Pages;
use App\Filament\Resources\JadwalResource\RelationManagers;

class JadwalResource extends Resource
{
    protected static ?string $model = Jadwal::class;
    protected static ?string $pluralModelLabel = 'Jadwal';
    protected static ?string $modelLabel = 'Jadwal';
    protected static ?string $navigationIcon = 'heroicon-o-calendar';
    protected static ?string $navigationLabel = 'JADWAL';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Rincian Jadwal')
                    ->description('Lengkapi Rincian Jadwal Terlebih dahulu')
                    ->schema([
                        Forms\Components\TextInput::make('nomor_spt')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\DatePicker::make('tanggal_mulai')
                            ->required()
                            ->reactive(),
                        Forms\Components\DatePicker::make('tanggal_selesai')
                            ->required()
                            ->afterOrEqual('tanggal_mulai'),
                        Select::make('pegawai_id')
                            ->label('Penanggung Jawab')
                            ->relationship('pegawai', 'nama')
                            ->searchable()
                            ->options(Pegawai::all()->pluck('nama', 'id'))
                            ->preload()
                            ->required()
                            ->reactive()
                            ->native(false) // Untuk tampilan yang lebih modern
                            ->placeholder('Cari Pegawai...')
                            ->rules([
                        // Memanggil custom rule kita
                        function (Get $get, string $operation, ?Jadwal $record) {
                            return (new PegawaiJadwalOverlap())
                                ->forDates($get('tanggal_mulai'), $get('tanggal_selesai'))
                                ->ignore($record?->id); // Lewatkan ID record jika sedang update
                        },
                    ])
                            ,


                        ])
                    ->columns(4),
                Forms\Components\Section::make('')

                    ->schema([
                        Select::make('kegiatan_id')
                            ->label('Kegiatan')
                            ->relationship('kegiatan', 'nama_kegiatan')
                            ->options(Kegiatan::all()->pluck('nama_kegiatan', 'id'))
                            ->searchable()
                            ->preload()
                            ->required()
                            ->native(false) // Untuk tampilan yang lebih modern
                            ->placeholder('Cari kegiatan...')
                            ->hint('Ketik untuk mencari kegiatan'),

                        Forms\Components\TextInput::make('tujuan')
                            ->required()
                            ->maxLength(255),
                            ]),


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nomor_spt')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tanggal_mulai')
                    ->date()
                    ->label('Tanggal')
                    ->sortable(),
                Tables\Columns\TextColumn::make('tanggal_selesai')
                    ->date()
                    ->hidden(),
                Tables\Columns\TextColumn::make('kegiatan.nama_kegiatan'),
                Tables\Columns\TextColumn::make('tujuan'),
                Tables\Columns\TextColumn::make('pegawai.nama')
                    ->label('Petugas'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('kegiatan')
                    ->relationship('kegiatan', 'nama_kegiatan'),
            ])

            ->actions([
                ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                Action::make('Cetak')
                    ->label('Cetak SPPD')
                    ->icon('heroicon-o-printer')
                    ->url(fn (Jadwal $record) => route('jadwal.cetak', $record))
                    ->openUrlInNewTab(),
                Action::make('Cetak SPT')
                    ->label('Cetak SPT')
                    ->url(fn (Jadwal $record) => route('spt.cetak', $record->id))
                    ->openUrlInNewTab()
                    ->icon('heroicon-o-printer')
                    ->color('success'),
                Action::make('cetak_kwitansi')
                ->label('Cetak Kwitansi')
                ->url(fn ($record) => route('kwitansi.cetak', $record))
                ->openUrlInNewTab(),
                ])
                    ->button()
                    ->label('Actions'),



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
            RelationManagers\PengikutsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListJadwals::route('/'),
            'create' => Pages\CreateJadwal::route('/create'),
            'edit' => Pages\EditJadwal::route('/{record}/edit'),
            'view' => Pages\ViewJadwal::route('/{record}'),
            'cetak' => Pages\CetakJadwal::route('/{record}/cetak'),

        ];
    }
}
