<?php

namespace App\Filament\Resources\SetorDetails;

use App\Filament\Resources\SetorDetails\Pages\CreateSetorDetail;
use App\Filament\Resources\SetorDetails\Pages\EditSetorDetail;
use App\Filament\Resources\SetorDetails\Pages\ListSetorDetails;
use App\Filament\Resources\SetorDetails\Schemas\SetorDetailForm;
use App\Filament\Resources\SetorDetails\Tables\SetorDetailsTable;
use App\Models\SetorDetail;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use UnitEnum;

class SetorDetailResource extends Resource
{
    protected static ?string $model = SetorDetail::class;

    protected static bool $shouldRegisterNavigation = false;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-list-bullet';

    protected static string|UnitEnum|null $navigationGroup = 'Transaksi';

    protected static ?string $navigationLabel = 'Detail Setor';

    protected static ?string $modelLabel = 'Detail Setor';

    protected static ?string $pluralModelLabel = 'Detail Setor';

    protected static ?string $recordTitleAttribute = 'id';

    public static function form(Schema $schema): Schema
    {
        return SetorDetailForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SetorDetailsTable::configure($table);
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
            'index' => ListSetorDetails::route('/'),
            'create' => CreateSetorDetail::route('/create'),
            'edit' => EditSetorDetail::route('/{record}/edit'),
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
