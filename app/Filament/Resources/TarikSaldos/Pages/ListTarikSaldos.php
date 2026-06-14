<?php

namespace App\Filament\Resources\TarikSaldos\Pages;

use App\Filament\Resources\TarikSaldos\TarikSaldoResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListTarikSaldos extends ListRecords
{
    protected static string $resource = TarikSaldoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
