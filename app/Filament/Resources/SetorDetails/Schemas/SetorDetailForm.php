<?php

namespace App\Filament\Resources\SetorDetails\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class SetorDetailForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('setor_header_id')
                    ->relationship('setorHeader', 'id')
                    ->required(),
                Select::make('barang_id')
                    ->relationship('barang', 'id')
                    ->required(),
                TextInput::make('jumlah')
                    ->required()
                    ->numeric(),
                TextInput::make('subtotal')
                    ->required()
                    ->numeric()
                    ->default(0.0),
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
