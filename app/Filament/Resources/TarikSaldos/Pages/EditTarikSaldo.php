<?php

namespace App\Filament\Resources\TarikSaldos\Pages;

use App\Filament\Resources\TarikSaldos\TarikSaldoResource;
use App\Support\BukuTransaksiSynchronizer;
use App\Support\WargaSaldoService;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditTarikSaldo extends EditRecord
{
    protected static string $resource = TarikSaldoResource::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['total'] = abs((float) ($data['total'] ?? 0));

        return $data;
    }

    protected function beforeSave(): void
    {
        $wargaId = (int) ($this->data['warga_id'] ?? 0);
        $nominal = abs((float) ($this->data['total'] ?? 0));
        $saldoService = app(WargaSaldoService::class);
        $saldoTersedia = $saldoService->getSaldoByWargaId($wargaId, $this->getRecord()->getKey());

        if ($saldoService->hasSaldoCukup($wargaId, $nominal, $this->getRecord()->getKey())) {
            return;
        }

        Notification::make()
            ->danger()
            ->title('Saldo tidak mencukupi')
            ->body('Saldo tersedia ' . $saldoService->formatSaldo($saldoTersedia) . ', tidak cukup untuk tarik saldo ' . $saldoService->formatSaldo($nominal) . '.')
            ->send();

        $this->halt();
    }

    protected function afterSave(): void
    {
        app(BukuTransaksiSynchronizer::class)
            ->syncForTarikSaldo($this->getRecord());
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
