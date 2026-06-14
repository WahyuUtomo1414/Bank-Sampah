<?php

namespace App\Filament\Resources\SetorHeaders;

use App\Filament\Resources\SetorHeaders\Pages\CreateSetorHeader;
use App\Filament\Resources\SetorHeaders\Pages\EditSetorHeader;
use App\Filament\Resources\SetorHeaders\Pages\ListSetorHeaders;
use App\Filament\Resources\SetorHeaders\Schemas\SetorHeaderForm;
use App\Filament\Resources\SetorHeaders\Tables\SetorHeadersTable;
use App\Models\SetorHeader;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SetorHeaderResource extends Resource
{
    protected static ?string $model = SetorHeader::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'SetorHeader';

    public static function form(Schema $schema): Schema
    {
        return SetorHeaderForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SetorHeadersTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListSetorHeaders::route('/'),
            'create' => CreateSetorHeader::route('/create'),
            'edit' => EditSetorHeader::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
