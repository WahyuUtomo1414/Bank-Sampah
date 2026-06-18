<?php

namespace App\Filament\Resources\SetorHeaders\Schemas;

use App\Filament\Support\AuditInfolistEntries;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\RepeatableEntry\TableColumn;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class SetorHeaderInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Setor')
                    ->schema([
                        TextEntry::make('warga.nama')
                            ->label('Warga'),
                        TextEntry::make('kode')
                            ->label('Kode'),
                        TextEntry::make('tanggal_transaksi')
                            ->label('Tanggal Transaksi')
                            ->date('d M Y'),
                        TextEntry::make('total_harga')
                            ->label('Total Harga')
                            ->money('IDR'),
                        // IconEntry::make('active')
                        //     ->label('Aktif')
                        //     ->boolean(),
                        TextEntry::make('deskripsi')
                            ->label('Deskripsi')
                            ->placeholder('-')
                            ->columnSpanFull(),
                    ])
                    ->columns(2)->columnSpanFull(),
                Section::make('Detail Setoran')
                    ->schema([
                        RepeatableEntry::make('detail')
                            ->label('Daftar Barang')
                            ->placeholder('Belum ada detail setoran.')
                            ->schema([
                                TextEntry::make('barang.nama')
                                    ->label('Barang'),
                                TextEntry::make('jumlah')
                                    ->label('Jumlah')
                                    ->numeric(),
                                TextEntry::make('subtotal')
                                    ->label('Subtotal')
                                    ->money('IDR'),
                            ])
                            ->table([
                                TableColumn::make('Barang'),
                                TableColumn::make('Jumlah'),
                                TableColumn::make('Subtotal'),
                            ]),
                    ])->columnSpanFull(),
                Section::make('Audit')
                    ->schema(AuditInfolistEntries::make())
                    ->columns(2)->columnSpanFull(),
            ]);
    }
}
