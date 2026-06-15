<?php

namespace App\Filament\Resources\SetorHeaders\Pages;

use App\Filament\Resources\SetorHeaders\SetorHeaderResource;
use App\Support\BukuTransaksiSynchronizer;
use Filament\Resources\Pages\CreateRecord;

class CreateSetorHeader extends CreateRecord
{
    protected static string $resource = SetorHeaderResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['total_harga'] = collect($data['detail'] ?? [])
            ->sum(fn (array $item) => (float) ($item['subtotal'] ?? 0));

        return $data;
    }

    protected function afterCreate(): void
    {
        app(BukuTransaksiSynchronizer::class)
            ->syncForSetorHeader($this->getRecord());
    }
}
