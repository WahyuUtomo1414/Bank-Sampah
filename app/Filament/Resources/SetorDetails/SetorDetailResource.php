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
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SetorDetailResource extends Resource
{
    protected static ?string $model = SetorDetail::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'SetorDetail';

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

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
