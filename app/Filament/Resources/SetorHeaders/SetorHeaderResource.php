<?php

namespace App\Filament\Resources\SetorHeaders;

use App\Filament\Resources\SetorHeaders\Pages\CreateSetorHeader;
use App\Filament\Resources\SetorHeaders\Pages\EditSetorHeader;
use App\Filament\Resources\SetorHeaders\Pages\ListSetorHeaders;
use App\Filament\Resources\SetorHeaders\Pages\ViewSetorHeader;
use App\Filament\Resources\SetorHeaders\Schemas\SetorHeaderForm;
use App\Filament\Resources\SetorHeaders\Schemas\SetorHeaderInfolist;
use App\Filament\Resources\SetorHeaders\Tables\SetorHeadersTable;
use App\Models\SetorHeader;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use UnitEnum;

class SetorHeaderResource extends Resource
{
    protected static ?string $model = SetorHeader::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-arrow-down-tray';

    protected static string|UnitEnum|null $navigationGroup = 'Transaksi';

    protected static ?string $navigationLabel = 'Setor Sampah';

    protected static ?string $modelLabel = 'Setor Sampah';

    protected static ?string $pluralModelLabel = 'Setor Sampah';

    protected static ?string $recordTitleAttribute = 'kode';

    public static function form(Schema $schema): Schema
    {
        return SetorHeaderForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return SetorHeaderInfolist::configure($schema);
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
            'view' => ViewSetorHeader::route('/{record}'),
            'edit' => EditSetorHeader::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->with([
                'warga',
                'detail.barang',
            ])
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
