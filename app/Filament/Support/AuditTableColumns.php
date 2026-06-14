<?php

namespace App\Filament\Support;

use Filament\Tables\Columns\TextColumn;

class AuditTableColumns
{
    public static function make(): array
    {
        return [
            TextColumn::make('createdBy.name')
                ->label('Dibuat Oleh')
                ->badge()
                ->description(fn ($record) => $record->created_at?->format('d M Y H:i'))
                ->sortable(),
            TextColumn::make('updatedBy.name')
                ->label('Diubah Oleh')
                ->badge()
                ->description(fn ($record) => $record->updated_at?->format('d M Y H:i'))
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            TextColumn::make('deletedBy.name')
                ->label('Dihapus Oleh')
                ->badge()
                ->description(fn ($record) => $record->deleted_at?->format('d M Y H:i'))
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
        ];
    }
}
