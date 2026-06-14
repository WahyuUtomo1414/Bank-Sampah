<?php

namespace App\Filament\Resources\Barangs\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class BarangForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('kategori_id')
                    ->relationship('kategori', 'id')
                    ->required(),
                Select::make('unit_id')
                    ->relationship('unit', 'id')
                    ->required(),
                TextInput::make('kode')
                    ->required(),
                TextInput::make('nama')
                    ->required(),
                TextInput::make('foto'),
                TextInput::make('harga')
                    ->numeric(),
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
