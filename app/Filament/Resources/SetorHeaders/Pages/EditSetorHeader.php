<?php

namespace App\Filament\Resources\SetorHeaders\Pages;

use App\Filament\Resources\SetorHeaders\SetorHeaderResource;
use App\Support\BukuTransaksiSynchronizer;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditSetorHeader extends EditRecord
{
    protected static string $resource = SetorHeaderResource::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['total_harga'] = collect($data['detail'] ?? [])
            ->sum(fn (array $item) => (float) ($item['subtotal'] ?? 0));

        return $data;
    }

    protected function afterSave(): void
    {
        app(BukuTransaksiSynchronizer::class)
            ->syncForSetorHeader($this->getRecord());
    }

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
