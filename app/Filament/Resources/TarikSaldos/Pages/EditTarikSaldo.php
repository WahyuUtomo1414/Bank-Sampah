<?php

namespace App\Filament\Resources\TarikSaldos\Pages;

use App\Filament\Resources\TarikSaldos\TarikSaldoResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditTarikSaldo extends EditRecord
{
    protected static string $resource = TarikSaldoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
