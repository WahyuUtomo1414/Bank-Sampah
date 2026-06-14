<?php

namespace App\Filament\Resources\BukuTransaksis\Pages;

use App\Filament\Resources\BukuTransaksis\BukuTransaksiResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditBukuTransaksi extends EditRecord
{
    protected static string $resource = BukuTransaksiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
