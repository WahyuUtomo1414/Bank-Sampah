<?php

namespace App\Filament\Resources\TarikSaldos\Pages;

use App\Filament\Resources\TarikSaldos\TarikSaldoResource;
use App\Support\BukuTransaksiSynchronizer;
use App\Support\WargaSaldoService;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateTarikSaldo extends CreateRecord
{
    protected static string $resource = TarikSaldoResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['total'] = abs((float) ($data['total'] ?? 0));

        return $data;
    }

    protected function beforeCreate(): void
    {
        $wargaId = (int) ($this->data['warga_id'] ?? 0);
        $nominal = abs((float) ($this->data['total'] ?? 0));
        $saldoService = app(WargaSaldoService::class);
        $saldoTersedia = $saldoService->getSaldoByWargaId($wargaId);

        if ($saldoService->hasSaldoCukup($wargaId, $nominal)) {
            return;
        }

        Notification::make()
            ->danger()
            ->title('Saldo tidak mencukupi')
            ->body('Saldo tersedia ' . $saldoService->formatSaldo($saldoTersedia) . ', tidak cukup untuk tarik saldo ' . $saldoService->formatSaldo($nominal) . '.')
            ->send();

        $this->halt();
    }

    protected function afterCreate(): void
    {
        app(BukuTransaksiSynchronizer::class)
            ->syncForTarikSaldo($this->getRecord());
    }
}
