<?php

namespace App\Filament\Resources\SetorDetails\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class SetorDetailForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Detail Setor')
                    ->schema([
                        Select::make('setor_header_id')
                            ->label('Transaksi Setor')
                            ->relationship('setorHeader', 'kode')
                            ->searchable()
                            ->preload()
                            ->required(),
                        Select::make('barang_id')
                            ->label('Barang')
                            ->relationship('barang', 'nama')
                            ->searchable()
                            ->preload()
                            ->required(),
                        TextInput::make('jumlah')
                            ->label('Jumlah')
                            ->required()
                            ->numeric()
                            ->minValue(1),
                        TextInput::make('subtotal')
                            ->label('Subtotal')
                            ->required()
                            ->numeric()
                            ->prefix('Rp'),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),
            ]);
    }
}
