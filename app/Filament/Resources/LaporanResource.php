<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Jadwal;
use App\Models\Laporan;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use App\Filament\Resources\LaporanResource\Pages;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
use Dompdf\Dompdf;
use Dompdf\Options;

class LaporanResource extends Resource
{
    protected static ?string $model = Laporan::class;
    protected static ?string $modelLabel = 'LAPORAN';
    protected static ?string $pluralModelLabel = 'LAPORAN';
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('jadwal_id')
                    ->label('Pilih Kegiatan (Nomor SPT - Tanggal Mulai)')
                    ->options(function () {
                        // Ambil jadwal dengan join kegiatan untuk form select, gabungkan string untuk mempermudah pencarian
                        return Jadwal::select('jadwals.id', 'kegiatans.nama_kegiatan', 'jadwals.nomor_spt', 'jadwals.tanggal_mulai')
                            ->join('kegiatans', 'jadwals.kegiatan_id', '=', 'kegiatans.id')
                            ->orderBy('kegiatans.nama_kegiatan')
                            ->get()
                            ->mapWithKeys(function ($item) {
                                $label = 'SPT: ' . $item->nomor_spt .' | Kegiatan:'. $item->nama_kegiatan .' | Tgl: ' . $item->tanggal_mulai->format('d-m-Y');
                                return [$item->id => $label];
                            });
                    })
                    ->searchable()
                    ->required(),

                Forms\Components\TextInput::make('hasil_kegiatan')
                    ->label('Hasil Kegiatan')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('kesimpulan')
                    ->label('Kesimpulan')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('saran')
                    ->label('Saran')
                    ->maxLength(255),

                Forms\Components\FileUpload::make('foto')
                    ->label('Foto')
                    ->multiple()
                    ->directory('foto')
                    ->disk('public')
                    ->maxParallelUploads(2)
                    ->image()
                    ->imageEditor()
                    ->imageEditorAspectRatios([
                        '16:9',
                        '4:3',
                        '1:1',
                        ])
                    ->maxFiles(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->label('ID')->sortable(),

                Tables\Columns\TextColumn::make('jadwal.kegiatan.nama_kegiatan')
                    ->label('Nama Kegiatan')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('jadwal.nomor_spt')
                    ->label('Nomor SPT')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('jadwal.tanggal_mulai')
                    ->label('Tanggal Mulai')
                    ->date()
                    ->sortable(),

                Tables\Columns\TextColumn::make('jadwal.pegawai.nama')
                    ->label('Nama Pegawai')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('hasil_kegiatan')
                    ->label('Hasil Kegiatan')
                    ->sortable()
                    ->wrap(),

                Tables\Columns\TextColumn::make('kesimpulan')
                    ->label('Kesimpulan')
                    ->sortable()
                    ->wrap(),

                Tables\Columns\TextColumn::make('saran')
                    ->label('Saran')
                    ->wrap(),

                Tables\Columns\ImageColumn::make('foto')
                    ->label('Foto')
                    ->getStateUsing(fn ($record) => $record->foto ? asset('storage/foto/'.$record->foto[0]) : null)
                    ->square(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat Pada')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Diupdate Pada')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),
            ])

            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),

            ])

            ->defaultSort('created_at', 'desc')
            ->filters([
                //
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
            'index' => Pages\ListLaporans::route('/'),
            'create' => Pages\CreateLaporan::route('/create'),
            'edit' => Pages\EditLaporan::route('/{record}/edit'),
            'view' => Pages\ViewLaporan::route('/{record}'),

        ];
    }

        public static function getRoutes(): array
    {
        return array_merge(parent::getRoutes(), [
        Route::get('/laporans/{record}/print', [static::class, 'print'])
            ->name('filament.resources.laporans.print')
            ->middleware(['web', 'auth']),
                ]);
    }


}
