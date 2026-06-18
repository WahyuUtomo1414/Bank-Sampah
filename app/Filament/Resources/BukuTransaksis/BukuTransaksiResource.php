<?php

namespace App\Filament\Resources\BukuTransaksis;

use App\Filament\Resources\BukuTransaksis\Pages\ListBukuTransaksis;
use App\Filament\Resources\BukuTransaksis\Tables\BukuTransaksisTable;
use App\Models\BukuTransaksi;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use UnitEnum;

class BukuTransaksiResource extends Resource
{
    protected static ?string $model = BukuTransaksi::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-receipt-percent';

    protected static string|UnitEnum|null $navigationGroup = 'Transaksi';

    protected static ?string $navigationLabel = 'Buku Transaksi';

    protected static ?string $modelLabel = 'Buku Transaksi';

    protected static ?string $pluralModelLabel = 'Buku Transaksi';

    protected static ?string $recordTitleAttribute = 'ref_type';

    public static function table(Table $table): Table
    {
        return BukuTransaksisTable::configure($table);
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
            'index' => ListBukuTransaksis::route('/'),
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
