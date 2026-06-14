<?php

namespace App\Filament\Resources\SetorHeaders\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
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
                            ->required()
                            ->numeric()
                            ->prefix('Rp'),
                        Textarea::make('deskripsi')
                            ->label('Deskripsi')
                            ->rows(4)
                            ->columnSpanFull(),
                        Toggle::make('active')
                            ->label('Aktif')
                            ->default(true),
                    ])
                    ->columns(2),
            ]);
    }
}
