<?php

namespace App\Filament\Resources;

use Illuminate\Support\Carbon;
use Filament\Forms;
use Filament\Tables;
use App\Models\Belanja;
use App\Models\Kegiatan;
use Filament\Forms\Form;
use App\Models\TokoWarung;
use Filament\Tables\Table;
use Filament\Support\RawJs;
use Filament\Resources\Resource;
use App\Filament\Resources\BelanjaResource\Pages;
use Filament\Actions\Action;

class BelanjaResource extends Resource
{
    protected static ?string $model = Belanja::class;

    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';
    protected static ?string $navigationLabel = 'BELANJA';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('rincian')
                    ->label('Rincian')
                    ->required(),
                Forms\Components\TextInput::make('toko')
                    ->label('Toko/Nama')
                    ->required(),


                Forms\Components\TextInput::make('harga')
                    ->label('Harga Satuan')
                    ->required()
                    ->numeric()
                    ->minValue(0),

                Forms\Components\Select::make('satuan')
                            ->options([
                                    'paket' => 'Paket',
                                    'box' => 'Box',
                                    'pcs' => 'Pcs',
                                  ])
                            ->label('Satuan')
                            ->required(),
                Forms\Components\TextInput::make('jumlah')
                    ->numeric()
                    ->label('Jumlah')
                    ->required(),
                Forms\Components\DatePicker::make('tanggal_belanja')
                    ->label('Tanggal Belanja')
                    ->required(),
                Forms\Components\DatePicker::make('tanggal_bayar')
                    ->label('Tanggal Bayar')
                    ->required(),


            ]);
    }

   public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->sortable(),
                Tables\Columns\TextColumn::make('toko')->label('Toko/Warung')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('rincian')->label('Rincian')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('harga')->money('idr', true),
                Tables\Columns\TextColumn::make('satuan')->label('Satuan'),
                Tables\Columns\TextColumn::make('jumlah')->label('Jumlah'),
                Tables\Columns\TextColumn::make('tanggal_belanja')->date()
                    ->formatStateUsing(fn ($state) => Carbon::parse($state)->translatedFormat('d F Y')),
                Tables\Columns\TextColumn::make('tanggal_bayar')->date()
                    ->formatStateUsing(fn ($state) => Carbon::parse($state)->translatedFormat('d F Y')),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->hidden(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\Action::make('cetak')
                ->label('Cetak')
                ->icon('heroicon-o-printer')
                ->url(fn ($record) => route('belanja.cetak', $record->id))
                ->openUrlInNewTab(),

            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBelanjas::route('/'),
            'create' => Pages\CreateBelanja::route('/create'),
            'edit' => Pages\EditBelanja::route('/{record}/edit'),
        ];
    }
}
