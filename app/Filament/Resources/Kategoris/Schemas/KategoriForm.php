<?php

namespace App\Filament\Resources\Kategoris\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class KategoriForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Kategori')
                    ->schema([
                        TextInput::make('nama')
                            ->label('Nama')
                            ->required()
                            ->maxLength(128),
                        Select::make('type')
                            ->label('Tipe')
                            ->options([
                                'barang' => 'Barang',
                                'artikel' => 'Artikel',
                            ])
                            ->required(),
                        Toggle::make('active')
                            ->label('Aktif')
                            ->default(true),
                        Textarea::make('deskripsi')
                            ->label('Deskripsi')
                            ->rows(4)
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
            ]);
    }
}
