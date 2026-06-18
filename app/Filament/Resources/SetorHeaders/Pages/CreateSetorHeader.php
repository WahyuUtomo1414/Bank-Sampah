<?php

namespace App\Filament\Resources\SetorHeaders\Pages;

use App\Filament\Resources\SetorHeaders\SetorHeaderResource;
use App\Filament\Resources\SetorHeaders\Schemas\SetorHeaderForm;
use App\Models\SetorHeader;
use App\Support\BukuTransaksiSynchronizer;
use Filament\Resources\Pages\CreateRecord;

class CreateSetorHeader extends CreateRecord
{
    protected static string $resource = SetorHeaderResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['kode'] = $this->generateKodeTransaksi();
        $data['detail'] = SetorHeaderForm::normalizeItems($data['detail'] ?? []);
        $data['total_harga'] = SetorHeaderForm::calculateTotal($data['detail']);

        return $data;
    }

    protected function afterCreate(): void
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

    protected function generateKodeTransaksi(): string
    {
        $prefix = 'STR-' . now()->format('Ymd') . '-';
        $lastKode = SetorHeader::query()
            ->where('kode', 'like', $prefix . '%')
            ->latest('id')
            ->value('kode');

        $lastSequence = (int) substr((string) $lastKode, -4);

        return $prefix . str_pad((string) ($lastSequence + 1), 4, '0', STR_PAD_LEFT);
    }
}
