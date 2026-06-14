<?php

namespace App\Filament\Support;

use Filament\Infolists\Components\TextEntry;

class AuditInfolistEntries
{
    public static function make(): array
    {
        return [
            TextEntry::make('createdBy.name')
                ->label('Dibuat Oleh')
                ->badge()
                ->placeholder('-'),
            TextEntry::make('updatedBy.name')
                ->label('Diubah Oleh')
                ->badge()
                ->placeholder('-'),
            TextEntry::make('deletedBy.name')
                ->label('Dihapus Oleh')
                ->badge()
                ->placeholder('-'),
            TextEntry::make('created_at')
                ->label('Dibuat Pada')
                ->dateTime('d M Y H:i')
                ->placeholder('-'),
            TextEntry::make('updated_at')
                ->label('Diubah Pada')
                ->dateTime('d M Y H:i')
                ->placeholder('-'),
            TextEntry::make('deleted_at')
                ->label('Dihapus Pada')
                ->dateTime('d M Y H:i')
                ->placeholder('-'),
        ];
    }
}
