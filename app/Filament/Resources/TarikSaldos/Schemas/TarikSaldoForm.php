<?php

namespace App\Filament\Resources\TarikSaldos\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class TarikSaldoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('warga_id')
                    ->relationship('warga', 'id')
                    ->required(),
                TextInput::make('total')
                    ->required()
                    ->numeric(),
                DatePicker::make('tanggal_transaksi')
                    ->required(),
                Textarea::make('deskripsi')
                    ->columnSpanFull(),
                Toggle::make('active')
                    ->required(),
                TextInput::make('created_by')
                    ->required()
                    ->numeric()
                    ->default(1),
                TextInput::make('updated_by')
                    ->numeric(),
                TextInput::make('deleted_by')
                    ->numeric(),
            ]);
    }
}
