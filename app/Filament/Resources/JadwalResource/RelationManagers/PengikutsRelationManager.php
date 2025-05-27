<?php

namespace App\Filament\Resources\JadwalResource\RelationManagers;

use Closure;
use Filament\Forms;
use Filament\Tables;
use App\Models\Jadwal;
use App\Models\Pegawai;
use Filament\Forms\Get;
use App\Models\Pengikut;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Tables\Actions\Action;
use App\Rules\PengikutJadwalOverlap;
use Filament\Forms\Components\Select;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use Illuminate\Validation\ValidationException;
use Filament\Resources\RelationManagers\RelationManager;

class PengikutsRelationManager extends RelationManager
{
    protected static string $relationship = 'pengikut';

    public function form(Form $form): Form
    {
      return $form
        ->schema([
            Select::make('pegawai_id')
                ->label('Pegawai')
                ->relationship('pegawai', 'nama')
                ->options(Pegawai::all()->pluck('nama', 'id'))
                ->searchable()
                ->required()
                ->unique(ignoreRecord: true, modifyRuleUsing: function (Forms\Components\Select $component, \Illuminate\Validation\Rules\Unique $rule) {
                        return $rule->where('jadwal_id', $component->getLivewire()->ownerRecord->id);
                    }) // Modifikasi unique agar hanya unik di jadwal_id ini
                ->rules([
                        function (Get $get, string $operation, ?\App\Models\Pengikut $record) {
                            $currentJadwal = $this->ownerRecord; // Jadwal induk (JadwalResource)

                            // Pastikan jadwal induk memiliki tanggal
                            if (!$currentJadwal->tanggal_mulai || !$currentJadwal->tanggal_selesai) {
                                // Ini adalah skenario error yang harusnya ditangani di JadwalResource
                                // atau Anda bisa mengembalikan rule yang selalu lolos atau gagal
                                return \Illuminate\Validation\Rule::make(function ($attribute, $value, $fail) use ($currentJadwal) {
                                    $fail("Tanggal jadwal induk belum lengkap. Tidak bisa validasi pengikut.");
                                });
                            }

                            return (new PengikutJadwalOverlap())
                                ->forJadwalDates($currentJadwal->tanggal_mulai, $currentJadwal->tanggal_selesai)
                                ->inJadwal($currentJadwal->id)
                                ->ignorePengikut($record?->id);
                        },
                    ]),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('id')
            ->columns([
                Tables\Columns\TextColumn::make('pegawai.nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('pegawai.nip'),
                Tables\Columns\TextColumn::make('pegawai.pangkat')
                    ->label('Pangkat'),
                Tables\Columns\TextColumn::make('pegawai.golongan')
                    ->label('Golongan'),
                Tables\Columns\TextColumn::make('pegawai.status')
                    ->label('Status'),

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
                Action::make('cetakSppd')
                ->label('Cetak SPPD')
                ->color('primary')
                ->icon('heroicon-o-printer')
                ->url(fn ($record) => route('sppd.pengikut-asn.cetak', $record->jadwal_id) . '?pengikut_id=' . $record->id)
                ->openUrlInNewTab()
                ->visible(fn ($record) => $record->pegawai->status === 'asn'),

            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
