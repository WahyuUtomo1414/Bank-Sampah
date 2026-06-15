<?php

namespace App\Filament\Resources\TarikSaldos\Pages;

use App\Filament\Resources\TarikSaldos\TarikSaldoResource;
use App\Support\BukuTransaksiSynchronizer;
use Filament\Resources\Pages\CreateRecord;

class CreateTarikSaldo extends CreateRecord
{
    protected static string $resource = TarikSaldoResource::class;

    protected function afterCreate(): void
    {
        app(BukuTransaksiSynchronizer::class)
            ->syncForTarikSaldo($this->getRecord());
    }
}
