<?php

namespace App\Filament\Resources\BukuTransaksis;

use App\Filament\Resources\BukuTransaksis\Pages\CreateBukuTransaksi;
use App\Filament\Resources\BukuTransaksis\Pages\EditBukuTransaksi;
use App\Filament\Resources\BukuTransaksis\Pages\ListBukuTransaksis;
use App\Filament\Resources\BukuTransaksis\Schemas\BukuTransaksiForm;
use App\Filament\Resources\BukuTransaksis\Tables\BukuTransaksisTable;
use App\Models\BukuTransaksi;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
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

    public static function form(Schema $schema): Schema
    {
        return BukuTransaksiForm::configure($schema);
    }

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
            'create' => CreateBukuTransaksi::route('/create'),
            'edit' => EditBukuTransaksi::route('/{record}/edit'),
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
