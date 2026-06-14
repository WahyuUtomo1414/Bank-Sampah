<?php

namespace App\Filament\Resources\Wargas\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class WargaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Data Warga')
                    ->schema([
                        TextInput::make('nama')
                            ->label('Nama')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('no_tlpn')
                            ->label('No. Telepon')
                            ->tel()
                            ->required()
                            ->maxLength(18),
                        Toggle::make('active')
                            ->label('Aktif')
                            ->default(true),
                        Textarea::make('alamat')
                            ->label('Alamat')
                            ->rows(4)
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
            ]);
    }
}
