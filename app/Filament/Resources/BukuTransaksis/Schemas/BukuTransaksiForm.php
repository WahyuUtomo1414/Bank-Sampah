<?php

namespace App\Filament\Resources\BukuTransaksis\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class BukuTransaksiForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Buku Transaksi')
                    ->schema([
                        TextInput::make('ref_id')
                            ->label('Ref ID')
                            ->required()
                            ->numeric(),
                        Select::make('ref_type')
                            ->label('Tipe Referensi')
                            ->options([
                                'setor_header' => 'Setor Sampah',
                                'tarik_saldo' => 'Tarik Saldo',
                            ])
                            ->required(),
                        DatePicker::make('tanggal_transaksi')
                            ->label('Tanggal Transaksi')
                            ->required(),
                        Select::make('warga_id')
                            ->label('Warga')
                            ->relationship('warga', 'nama')
                            ->searchable()
                            ->preload()
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
                    ])
                    ->columns(2)
                    ->columnSpanFull(),
            ]);
    }
}
