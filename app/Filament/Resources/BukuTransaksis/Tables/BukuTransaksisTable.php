<?php

namespace App\Filament\Resources\BukuTransaksis\Tables;

use App\Filament\Support\AuditTableColumns;
use App\Models\BukuTransaksi;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class BukuTransaksisTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('ref_id')
                    ->label('Ref ID')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('ref_type')
                    ->label('Tipe Ref')
                    ->badge()
                    ->color(fn (string $state): string => $state === BukuTransaksi::REF_TYPE_SETOR_HEADER ? 'success' : 'warning')
                    ->formatStateUsing(fn (string $state): string => BukuTransaksi::getRefTypeOptions()[$state] ?? $state)
                    ->searchable(),
                TextColumn::make('tanggal_transaksi')
                    ->label('Tanggal Transaksi')
                    ->date()
                    ->sortable(),
                TextColumn::make('warga.nama')
                    ->label('Warga')
                    ->searchable(),
                TextColumn::make('total_harga')
                    ->label('Total Harga')
                    ->money('IDR')
                    ->sortable(),
                IconColumn::make('active')
                    ->label('Aktif')
                    ->boolean(),
                TextColumn::make('created_at')
                    ->label('Dibuat Pada')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label('Diubah Pada')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('deleted_at')
                    ->label('Dihapus Pada')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                ...AuditTableColumns::make(),
            ])
            ->filters([
                SelectFilter::make('ref_type')
                    ->label('Tipe Referensi')
                    ->options(BukuTransaksi::getRefTypeOptions()),
                TrashedFilter::make(),
            ])
            ->recordActions([])
            ->toolbarActions([]);
    }
}
