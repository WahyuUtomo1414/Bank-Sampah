<?php

namespace App\Filament\Resources\Profiles\Schemas;

use App\Filament\Support\AuditInfolistEntries;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ProfileInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Profile Lembaga')
                    ->schema([
                        ImageEntry::make('logo')
                            ->label('Logo')
                            ->disk('public')
                            ->placeholder('-'),
                        TextEntry::make('nama')
                            ->label('Nama'),
                        TextEntry::make('alamat')
                            ->label('Alamat')
                            ->placeholder('-'),
                        TextEntry::make('visi')
                            ->label('Visi')
                            ->placeholder('-'),
                        TextEntry::make('kontak')
                            ->label('Kontak')
                            ->formatStateUsing(fn ($state) => filled($state) ? json_encode($state, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) : '-')
                            ->columnSpanFull(),
                        TextEntry::make('misi')
                            ->label('Misi')
                            ->formatStateUsing(fn ($state) => filled($state) ? json_encode($state, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) : '-')
                            ->columnSpanFull(),
                        TextEntry::make('deskripsi')
                            ->label('Deskripsi')
                            ->placeholder('-')
                            ->columnSpanFull(),
                        IconEntry::make('active')
                            ->label('Aktif')
                            ->boolean(),
                    ])
                    ->columns(2),
                Section::make('Audit')
                    ->schema(AuditInfolistEntries::make())
                    ->columns(2),
            ]);
    }
}
