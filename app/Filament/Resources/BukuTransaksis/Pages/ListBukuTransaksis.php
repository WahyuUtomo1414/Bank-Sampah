<?php

namespace App\Filament\Resources\BukuTransaksis\Pages;

use App\Filament\Resources\BukuTransaksis\BukuTransaksiResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListBukuTransaksis extends ListRecords
{
    protected static string $resource = BukuTransaksiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
