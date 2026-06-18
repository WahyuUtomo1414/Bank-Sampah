<?php

namespace App\Filament\Resources\Artikels\Schemas;

use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ArtikelForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Artikel')
                    ->schema([
                        Select::make('kategori_id')
                            ->label('Kategori')
                            ->relationship(
                                'kategori',
                                'nama',
                                modifyQueryUsing: fn (Builder $query) => $query->where('type', 'artikel')
                            )
                            ->searchable()
                            ->preload()
                            ->required(),
                        TextInput::make('judul')
                            ->label('Judul')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('slug')
                            ->label('Slug')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255),
                        FileUpload::make('thumbnail')
                            ->label('Thumbnail')
                            ->image()
                            ->disk('public')
                            ->visibility('public')
                            ->directory('artikel'),
                        // FileUpload::make('foto')
                        //     ->label('Foto')
                        //     ->image()
                        //     ->disk('public')
                        //     ->visibility('public')
                        //     ->directory('artikel'),
                        Textarea::make('konten')
                            ->label('Konten')
                            ->required()
                            ->rows(10)
                            ->columnSpanFull(),
                        Toggle::make('active')
                            ->label('Aktif')
                            ->default(true),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),
            ]);
    }
}
