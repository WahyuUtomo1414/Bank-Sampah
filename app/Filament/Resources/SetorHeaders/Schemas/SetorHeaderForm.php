<?php

namespace App\Filament\Resources\SetorHeaders\Schemas;

use App\Models\Barang;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;

class SetorHeaderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Transaksi Setor')
                    ->schema([
                        Select::make('warga_id')
                            ->label('Warga')
                            ->relationship('warga', 'nama')
                            ->searchable()
                            ->preload()
                            ->required(),
                        TextInput::make('kode')
                            ->label('Kode Transaksi')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(128),
                        DatePicker::make('tanggal_transaksi')
                            ->label('Tanggal Transaksi')
                            ->required(),
                        TextInput::make('total_harga')
                            ->label('Total Harga')
                            ->readOnly()
                            ->dehydrated()
                            ->numeric()
                            ->default(0)
                            ->prefix('Rp'),
                        Textarea::make('deskripsi')
                            ->label('Deskripsi')
                            ->rows(4)
                            ->columnSpanFull(),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),
                Section::make('Detail Setor')
                    ->schema([
                        Repeater::make('detail')
                            ->label('Item Setoran')
                            ->relationship()
                            ->live()
                            ->afterStateUpdated(fn ($state, Set $set) => self::syncGrandTotal($set, $state))
                            ->schema([
                                Select::make('barang_id')
                                    ->label('Barang')
                                    ->relationship('barang', 'nama')
                                    ->searchable()
                                    ->preload()
                                    ->required()
                                    ->live()
                                    ->afterStateUpdated(function (Get $get, Set $set) {
                                        self::syncItemSubtotal($get, $set);
                                        $set('../../total_harga', collect($get('../../detail') ?? [])
                                            ->sum(fn ($item) => (float) ($item['subtotal'] ?? 0)));
                                    }),
                                TextInput::make('jumlah')
                                    ->label('Jumlah')
                                    ->required()
                                    ->numeric()
                                    ->default(1)
                                    ->live()
                                    ->afterStateUpdated(function (Get $get, Set $set) {
                                        self::syncItemSubtotal($get, $set);
                                        $set('../../total_harga', collect($get('../../detail') ?? [])
                                            ->sum(fn ($item) => (float) ($item['subtotal'] ?? 0)));
                                    }),
                                TextInput::make('subtotal')
                                    ->label('Subtotal')
                                    ->readOnly()
                                    ->dehydrated()
                                    ->numeric()
                                    ->prefix('Rp')
                                    ->default(0),
                            ])
                            ->columns(3)
                            ->columnSpanFull(),
                    ])
                    ->columnSpanFull(),
            ]);
    }

    protected static function syncItemSubtotal(Get $get, Set $set): void
    {
        $harga = (float) (Barang::query()->find($get('barang_id'))?->harga ?? 0);
        $jumlah = (float) ($get('jumlah') ?? 0);

        $set('subtotal', $harga * $jumlah);
    }

    protected static function syncGrandTotal(Set $set, mixed $state): void
    {
        $total = collect($state ?? [])
            ->sum(fn ($item) => (float) ($item['subtotal'] ?? 0));

        $set('total_harga', $total);
    }
}
