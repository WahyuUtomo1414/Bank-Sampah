<?php

namespace App\Filament\Resources\BukuTransaksis\Pages;

use App\Filament\Resources\BukuTransaksis\BukuTransaksiResource;
use App\Filament\Widgets\BukuTransaksiStatsOverview;
use App\Models\BukuTransaksi;
use Filament\Resources\Pages\ListRecords;
use Filament\Schemas\Components\Tabs\Tab;
use Illuminate\Database\Eloquent\Builder;

class ListBukuTransaksis extends ListRecords
{
    protected static string $resource = BukuTransaksiResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            BukuTransaksiStatsOverview::class,
        ];
    }

    public function getTabs(): array
    {
        return [
            'semua' => Tab::make('Semua'),
            BukuTransaksi::REF_TYPE_SETOR_HEADER => Tab::make('Setor Sampah')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('ref_type', BukuTransaksi::REF_TYPE_SETOR_HEADER)),
            BukuTransaksi::REF_TYPE_TARIK_SALDO => Tab::make('Tarik Saldo')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('ref_type', BukuTransaksi::REF_TYPE_TARIK_SALDO)),
        ];
    }
}
