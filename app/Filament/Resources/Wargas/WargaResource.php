<?php

namespace App\Filament\Resources\Wargas;

use App\Filament\Resources\Wargas\Pages\CreateWarga;
use App\Filament\Resources\Wargas\Pages\EditWarga;
use App\Filament\Resources\Wargas\Pages\ListWargas;
use App\Filament\Resources\Wargas\Schemas\WargaForm;
use App\Filament\Resources\Wargas\Tables\WargasTable;
use App\Models\Warga;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use UnitEnum;

class WargaResource extends Resource
{
    protected static ?string $model = Warga::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-user-group';

    protected static string|UnitEnum|null $navigationGroup = 'Master Data';

    protected static ?string $navigationLabel = 'Warga';

    protected static ?string $modelLabel = 'Warga';

    protected static ?string $pluralModelLabel = 'Warga';

    protected static ?string $recordTitleAttribute = 'nama';

    public static function form(Schema $schema): Schema
    {
        return WargaForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return WargasTable::configure($table);
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
            'index' => ListWargas::route('/'),
            'create' => CreateWarga::route('/create'),
            'edit' => EditWarga::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
