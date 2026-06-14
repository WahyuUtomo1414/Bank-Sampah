<?php

namespace App\Filament\Resources\Barangs\Schemas;

use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class BarangForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Barang')
                    ->schema([
                        Select::make('kategori_id')
                            ->label('Kategori')
                            ->relationship(
                                'kategori',
                                'nama',
                                modifyQueryUsing: fn (Builder $query) => $query->where('type', 'barang')
                            )
                            ->searchable()
                            ->preload()
                            ->required(),
                        Select::make('unit_id')
                            ->label('Satuan')
                            ->relationship('unit', 'nama')
                            ->searchable()
                            ->preload()
                            ->required(),
                        TextInput::make('kode')
                            ->label('Kode')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(20),
                        TextInput::make('nama')
                            ->label('Nama Barang')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('harga')
                            ->label('Harga')
                            ->numeric()
                            ->prefix('Rp'),
                        FileUpload::make('foto')
                            ->label('Foto')
                            ->image()
                            ->directory('barang'),
                        Textarea::make('deskripsi')
                            ->label('Deskripsi')
                            ->rows(4)
                            ->columnSpanFull(),
                        Toggle::make('active')
                            ->label('Aktif')
                            ->default(true),
                    ])
                    ->columns(2),
            ]);
    }
}
