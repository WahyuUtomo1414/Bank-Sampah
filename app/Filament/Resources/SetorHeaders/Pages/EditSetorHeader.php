<?php

namespace App\Filament\Resources\SetorHeaders\Pages;

use App\Filament\Resources\SetorHeaders\SetorHeaderResource;
use App\Filament\Resources\SetorHeaders\Schemas\SetorHeaderForm;
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
        $data['detail'] = SetorHeaderForm::normalizeItems($data['detail'] ?? []);
        $data['total_harga'] = SetorHeaderForm::calculateTotal($data['detail']);

        return $data;
    }

    protected function afterSave(): void
    {
        $totalHarga = (float) $this->getRecord()
            ->detail()
            ->sum('subtotal');

        $this->getRecord()->forceFill([
            'total_harga' => $totalHarga,
        ])->saveQuietly();

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
