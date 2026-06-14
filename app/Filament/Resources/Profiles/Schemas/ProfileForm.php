<?php

namespace App\Filament\Resources\Profiles\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ProfileForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Profile Lembaga')
                    ->schema([
                        FileUpload::make('logo')
                            ->label('Logo')
                            ->image()
                            ->directory('profile'),
                        TextInput::make('nama')
                            ->label('Nama')
                            ->required()
                            ->maxLength(128),
                        TextInput::make('alamat')
                            ->label('Alamat')
                            ->maxLength(255),
                        TextInput::make('visi')
                            ->label('Visi')
                            ->maxLength(255),
                        KeyValue::make('kontak')
                            ->label('Kontak')
                            ->keyLabel('Jenis')
                            ->valueLabel('Nilai')
                            ->columnSpanFull(),
                        TagsInput::make('misi')
                            ->label('Misi')
                            ->columnSpanFull(),
                        Textarea::make('deskripsi')
                            ->label('Deskripsi')
                            ->rows(6)
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
