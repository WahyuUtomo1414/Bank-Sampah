<?php

namespace App\Filament\Resources\Barangs\Schemas;

use App\Filament\Support\AuditInfolistEntries;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class BarangInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Barang')
                    ->schema([
                        TextEntry::make('kategori.nama')
                            ->label('Kategori'),
                        TextEntry::make('unit.nama')
                            ->label('Satuan'),
                        TextEntry::make('kode')
                            ->label('Kode'),
                        TextEntry::make('nama')
                            ->label('Nama Barang'),
                        TextEntry::make('harga')
                            ->label('Harga')
                            ->money('IDR'),
                        IconEntry::make('active')
                            ->label('Aktif')
                            ->boolean(),
                        ImageEntry::make('foto')
                            ->label('Foto')
                            ->disk('public')
                            ->visibility('public')
                            ->placeholder('-'),
                        TextEntry::make('deskripsi')
                            ->label('Deskripsi')
                            ->placeholder('-')
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
                Section::make('Audit')
                    ->schema(AuditInfolistEntries::make())
                    ->columns(2),
            ]);
    }
}
