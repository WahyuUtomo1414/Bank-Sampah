<?php

namespace App\Filament\Resources\Lokasis\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class LokasiForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Lokasi')
                    ->schema([
                        TextInput::make('nama')
                            ->label('Nama Lokasi')
                            ->required()
                            ->maxLength(128),
                        Toggle::make('active')
                            ->label('Aktif')
                            ->default(true),
                        Textarea::make('google_maps')
                            ->label('Google Maps')
                            ->rows(5)
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
            ]);
    }
}
