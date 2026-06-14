<?php

namespace App\Filament\Resources\TarikSaldos;

use App\Filament\Resources\TarikSaldos\Pages\CreateTarikSaldo;
use App\Filament\Resources\TarikSaldos\Pages\EditTarikSaldo;
use App\Filament\Resources\TarikSaldos\Pages\ListTarikSaldos;
use App\Filament\Resources\TarikSaldos\Schemas\TarikSaldoForm;
use App\Filament\Resources\TarikSaldos\Tables\TarikSaldosTable;
use App\Models\TarikSaldo;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use UnitEnum;

class TarikSaldoResource extends Resource
{
    protected static ?string $model = TarikSaldo::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-banknotes';

    protected static string|UnitEnum|null $navigationGroup = 'Transaksi';

    protected static ?string $navigationLabel = 'Tarik Saldo';

    protected static ?string $modelLabel = 'Tarik Saldo';

    protected static ?string $pluralModelLabel = 'Tarik Saldo';

    protected static ?string $recordTitleAttribute = 'id';

    public static function form(Schema $schema): Schema
    {
        return TarikSaldoForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TarikSaldosTable::configure($table);
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
            'index' => ListTarikSaldos::route('/'),
            'create' => CreateTarikSaldo::route('/create'),
            'edit' => EditTarikSaldo::route('/{record}/edit'),
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
