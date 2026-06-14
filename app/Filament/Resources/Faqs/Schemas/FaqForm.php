<?php

namespace App\Filament\Resources\Faqs\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class FaqForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('FAQ')
                    ->schema([
                        TextInput::make('pertanyaan')
                            ->label('Pertanyaan')
                            ->required()
                            ->maxLength(255),
                        Toggle::make('active')
                            ->label('Aktif')
                            ->default(true),
                        Textarea::make('jawaban')
                            ->label('Jawaban')
                            ->required()
                            ->rows(6)
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
            ]);
    }
}
